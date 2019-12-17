<?php

namespace App\Http\Resources;

use App\Facades\ArticleStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'author' => optional($this->user->profile)->full_name,
            'status' => ArticleStatus::get($this)->name(),
            'color' => ArticleStatus::get($this)->color(),
            'icon' => ArticleStatus::get($this)->icon(),
            'publish_at' => $this->is_approved ? $this->publish_at_from_DB : '',
            'comments_count' => $this->comments->count(),
            'link' => [
                'show' => route('admin.articles.show', $this),
                'edit' => route('admin.articles.edit', $this),
                'show_author' => $this->user->profile ? route('admin.profiles.show', $this->user->profile) : '',
                'show_comments' => route('admin.articles.show', $this).'?#cardComments',
            ]
        ];
    }
}
