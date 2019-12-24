<?php

namespace App\Rules;

use App\Article;
use Illuminate\Contracts\Validation\Rule;

class CanNotReplyToThemselves implements Rule
{
    public $comment;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value <> $this->comment->commenter_id;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected value is invalid.';
    }
}
