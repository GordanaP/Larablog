<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Str;
use App\Utilities\GeneratePassword;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;
use App\Contracts\EloquentModelRepository;

class UserRepository extends DeleteModel implements EloquentModelRepository
{
    /**
     * The roles.
     *
     * @var array
     */
    private $roles;

    /**
     * The generate password option.
     *
     * @var string
     */
    private $generate_password;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->model = User::class;
        $this->roles = request('role_id');
        $this->generate_password = request(GeneratePassword::get()->name);
    }

    /**
     * All records.
     *
     * @return Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model::with('roles')->get();
    }

    /**
     * Create a new user.
     *
     * @param  array $data
     * @return \App\User
     */
    public function create($data)
    {
        $user = $this->model::create($this->credentials($data));

        $user->assignRoles($this->roles);

        return $user;
    }

    /**
     * Update the user.
     *
     * @param  \App\User $user
     * @param  array $data
     * @return \App\User
     */
    public function update($user, $data)
    {
        $user->update($data);

        $user->assignRoles($this->roles);

        return $user;
    }

    /**
     * The user credentials.
     *
     * @param  array  $data
     * @return array
     */
    private function credentials(array $data)
    {
        if ($this->generate_password == 'auto_generate') {

            $data['password'] = Str::random(8);
        }

        return collect($data)->filter()->toArray();
    }
}
