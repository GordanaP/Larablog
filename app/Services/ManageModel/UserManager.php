<?php

namespace App\Services\ManageModel;

use App\User;
use Illuminate\Support\Str;
use App\Utilities\GeneratePassword;
use App\Services\ManageModel\Delete;
use Illuminate\Support\Facades\Request;

class UserManager extends Delete
{
    private $user;
    private $roles;
    private $generate_password;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = User::class;
        $this->user = Request::isMethod('POST') ? new $this->model : Request::route('user') ;
        $this->roles = request('role_id');
        $this->generate_password = request(GeneratePassword::get()->name);
    }

    public function save()
    {
        $user = $this->fromForm($this->data);

        $user->assignRoles($this->roles);

        return $user;
    }

    private function fromForm($data)
    {
        $this->user->fill($this->credentials($data))->save();

        return $this->user;
    }

    private function credentials(array $data)
    {
        if ($this->generate_password == 'auto_generate') {

            $data['password'] = Str::random(8);
        }

        return collect($data)->filter()->toArray();
    }
}
