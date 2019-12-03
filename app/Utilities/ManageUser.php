<?php

namespace App\Utilities;

use App\User;
use Illuminate\Support\Str;
use App\Utilities\ManageDelete;
use Illuminate\Support\Facades\Request;

class ManageUser extends ManageDelete
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
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = 'App\User';
        $this->user = Request::route('user') ?? request('ids');
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
    public function update($data)
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
