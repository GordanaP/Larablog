<?php

namespace App\Services\ManageModel;

use App\User;
use Illuminate\Support\Str;
use App\Contracts\ModelManager;
use App\Utilities\GeneratePassword;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;

class UserManager extends DeleteModel implements ModelManager
{
    private $user;
    private $roles;
    private $generate_password;

    public function __construct()
    {
        $this->model = User::class;
        // $this->user = Request::isMethod('POST') ? new $this->model : Request::route('user') ;
        $this->roles = request('role_id');
        $this->generate_password = request(GeneratePassword::get()->name);
    }

    public function save($data)
    {
        $user = $this->fromForm($data);

        $user->assignRoles($this->roles);

        return $user;
    }

    private function fromForm($data)
    {
        $user = $this->user()->fill($this->credentials($data));

        $user->save();

        return $user;
    }

    private function credentials(array $data)
    {
        if ($this->generate_password == 'auto_generate') {

            $data['password'] = Str::random(8);
        }

        return collect($data)->filter()->toArray();
    }

    private function user()
    {
        return Request::route('user') ?? new $this->model;
    }
}
