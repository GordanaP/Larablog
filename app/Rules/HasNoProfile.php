<?php

namespace App\Rules;

use App\User;
use Request;
use Illuminate\Contracts\Validation\Rule;

class HasNoProfile implements Rule
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
        $user = User::find($value);

        $authors_without_profile = ! ($profile = Request::route('profile'))
                ? User::authorsWithoutProfile()->get()
                : User::authorsWithoutProfile()->get()->prepend($profile->user);

        return  $authors_without_profile->contains('id', $user->id);
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
