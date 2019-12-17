<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'account' => $this->user->email,
            'articles_count' => $this->user->articles->count(),
            'link' => [
                'show' => route('admin.profiles.show', $this),
                'edit' => route('admin.profiles.edit', $this),
                'show_account' => route('admin.users.show', $this->user),
                'show_articles' => route('admin.profiles.show', $this).'?#cardArticles',
            ]
        ];
    }
}
