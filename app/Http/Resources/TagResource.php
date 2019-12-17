<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'articles_count' => $this->articles->count(),
            'link' => [
                'show' => route('admin.tags.show', $this),
                'edit' => route('admin.tags.edit', $this),
                'show_articles' => route('admin.tags.show', $this).'?#cardArticles',
            ]
        ];
    }
}
