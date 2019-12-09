<?php

namespace App\Utilities;

use App\User;
use App\Profile;
use App\Utilities\ManageDelete;
use Illuminate\Support\Facades\Request;

class ManageProfile extends ManageDelete
{
    /**
     * The profile.
     *
     * @var \App\Profile
     */
    private $profile;

    /**
     * The user.
     *
     * @var \App\User
     */
    private $author;

    /**
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = Profile::class;
        $this->instance = Request::route('profile') ?? request('ids');
        $this->profile = Request::isMethod('POST') ? new $this->model : $this->instance;
        $this->author  = Request::route('user') ?? User::find(request('user_id'));
    }

    /**
     * Create the profile;
     *
     * @param  array $data
     */
    public function create($data)
    {
        return $this->fromForm($data);
    }

    /**
     * Update the profile.
     *
     * @param  array $data
     */
    public function update($data)
    {
        $this->fromForm($data);
    }

    /**
     * Delete the profile.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->instance)
            ->remove();
    }

    /**
     * Create the profile from the form.
     *
     * @param  array $data
     * @return \App\Profile
     */
    private function fromForm($data)
    {
        return $this->profile->fill($data)->assignAuthor($this->author);
    }
}
