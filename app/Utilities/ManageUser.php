<?php

namespace App\Utilities;

use App\User;
use Illuminate\Support\Str;
use App\Utilities\ManageDelete;

class ManageUser extends ManageDelete
{
    private $roles;
    private $generate_password;

    /**
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = 'App\User';
        $this->user = request()->route('user') ?? request('ids');
        $this->roles = request('role_id');
        $this->generate_password = request('generate_password');
    }

    /**
     * Create the user;
     *
     * @param  array $data
     */
    public function create($data)
    {
        return tap(User::create($this->credentials($data)))
            ->addRoles($this->roles);
    }

    /**
     * Update the user.
     *
     * @param  array $data
     */
    public function update(array $data)
    {
        tap($this->user)->update($this->credentials($data))
            ->addRoles($this->roles);
    }

    /**
     * Delete the user.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->user)
            ->remove();
    }

    /**
     * The user credentials;
     *
     * @param  array  $data
     * @return array
     */
    public function credentials(array $data)
    {
        if ($this->generate_password == 'auto_generate') {

            $data['password'] = Str::random(8);
        }

        return collect($data)->filter()->toArray();
    }
}
