<?php

namespace App\Http\Resources;

use App\User;
use App\Article;
use Laravelista\Comments\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'body' => $this->comment,
            'article' => Article::find($this->commentable_id),
            'reply' => Comment::find($this->child_id),
            'commenter' => User::find($this->commenter_id)->email ?? $this->guest_email,
            'link' => [
                'show' => '#',
                'edit' => '#',
                'show_article' => route('admin.articles.show', $this->commentable),
                'show_commenter' => $this->commenter_id ? route('admin.users.show', $this->commenter) : '',
            ]
        ];
    }
}
