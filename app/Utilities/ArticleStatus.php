<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Request;


class ArticleStatus
{
    /**
     * The article
     *
     * @var \App\Article
     */
    public $article;

    /**
     * Create a new class instance.
     *
     * @param \App\Article | null $article
     */
    public function __construct($article = null)
    {
        $this->article = $article ?? Request::route('article');
    }

    /**
     * The class instance.
     *
     * @param  \App\Article $article
     * @return self
     */
    public static function get($article)
    {
        return new static($article);
    }

    /**
     * The status name.
     *
     * @return string
     */
    public function name()
    {
        if ($this->article->is_published) {
            $name = 'Published';
        } elseif($this->article->is_future) {
            $name = 'Future';
        } elseif ($this->article->is_draft) {
            $name = 'Draft';
        }
        return $name;
    }

    /**
     * The status icon.
     *
     * @return string
     */
    public function icon()
    {
        if ($this->article->is_published) {
            $icon = 'fas fa-calendar-check';
        } elseif($this->article->is_future) {
            $icon = 'fas fa-calendar-day';
        } elseif ($this->article->is_draft) {
            $icon = 'far fa-file-alt';
        }

        return $icon;
    }

    /**
     * The status color.
     *
     * @return string
     */
    public function color()
    {
        if ($this->article->is_published) {
            $color = '#4fd1c5';
        } elseif($this->article->is_future) {
            $color = '#f6ad55';
        } elseif ($this->article->is_draft) {
            $color = '#a0aec0';
        }

        return $color;
    }
}