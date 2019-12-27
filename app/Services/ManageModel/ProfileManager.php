<?php

namespace App\Services\ManageModel;

use App\User;
use App\Profile;
use App\Facades\ProfileImage;
use App\Contracts\ModelManager;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;

class ProfileManager extends DeleteModel implements ModelManager
{
    private $profile;
    private $author;
    private $image;

    public function __construct()
    {
        $this->model = Profile::class;
        $this->author  = Request::route('user') ?? User::find(request('user_id'));
        $this->image = request('avatar');
    }

    public function save($data)
    {
        $profile = $this->fromForm($data);

        ProfileImage::manage($profile, $this->image);

        return $profile;
    }

    private function fromForm($data)
    {
       return $this->author ? (Request::route('profile') ?? new $this->model)
            ->fill($data)
            ->assignAuthor($this->author)
        : tap($this->profile)->update($data);
    }
}
