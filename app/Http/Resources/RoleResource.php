<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'users_count' => $this->users_count,
            'link' => [
                'show' => route('admin.roles.show', $this),
                'edit' => route('admin.roles.edit', $this),
            ]
        ];
    }
}
