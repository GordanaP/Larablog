<?php

namespace App\Repositories;

use App\User;
use App\Profile;
use App\Contracts\ImageManager;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;
use App\Contracts\EloquentModelRepository;

class ProfileRepository extends DeleteModel implements EloquentModelRepository
{
    private $author;

    /**
     * The image.
     *
     * @var [type]
     */
    private $image;

    /**
     * The image manager.
     *
     * @var App\Contracts\ImageManager
     */
    private $imageManager;


    public function __construct(ImageManager $imageManager)
    {
        $this->model = Profile::class;
        $this->author  = User::find(request('user_id'));
        $this->image = request('avatar');
        $this->imageManager = $imageManager;
    }

    public function all()
    {
        return $this->model::with('user')->get();
    }

    public function create(array $data)
    {
        $profile = $this->fromForm($data);

        $this->imageManager->manage($profile, $this->image);

        return $profile;
    }

    public function update($profile, array $data)
    {
        $profile->update($data);

        $this->imageManager->manage($profile, $this->image);

        return $profile;
    }

    private function fromForm(array $data)
    {
        return $this->author->profile()->create($data);
    }
}
