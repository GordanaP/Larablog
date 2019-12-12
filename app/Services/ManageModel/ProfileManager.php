<?php

namespace App\Services\ManageModel;

use App\User;
use App\Profile;
use App\Facades\ProfileImage;
use App\Services\ManageModel\Delete;
use Illuminate\Support\Facades\Request;

class ProfileManager extends Delete
{
    private $profile;
    private $author;
    private $image;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Profile::class;
        $this->profile = Request::isMethod('POST') ? new $this->model : Request::route('profile') ;
        $this->author  = Request::route('user') ?? User::find(request('user_id'));
        $this->image = request('avatar');
    }

    public function save()
    {
        $profile = $this->fromForm($this->data);

        ProfileImage::manage($profile, $this->image);

        return $profile;
    }

    private function fromForm($data)
    {
        return $this->profile->fill($data)
            ->assignAuthor($this->author);
    }
}
