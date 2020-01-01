<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class MustBeAuthor implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return optional(User::find($value))->is_author;
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
