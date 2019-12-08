<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsDeterminedForApprovedArticleOnly implements Rule
{
    public $is_approved;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($is_approved)
    {
        $this->is_approved = $is_approved;
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
        return $this->is_approved == 0 ? is_null($value) : !is_null($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please approve the article before selecting the date of publishing.';
    }
}
