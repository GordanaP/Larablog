<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class SubmitForm
{
    /**
     * The buttom name.
     *
     * @var string
     */
    public $button_name = 'handle_submission';

    /**
     * The user.
     *
     * @var \App\User
     */
    public $user;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Create a new instance of the class.
     *
     * @return self
     */
    public static function get()
    {
        return new static();
    }

    /**
     * The form submit buttons.
     *
     * @return array
     */
    public function buttons()
    {
        if ($this->user->is_admin) {
            $buttons = [
                'edit' => [
                    'Edit & view' => 'do_and_show',
                    'Edit & edit again' => 'do_and_repeat'
                ],
                'create' => [
                    'Create & view' => 'do_and_show',
                    'Create & create new' => 'do_and_repeat',
                ],
            ];
        } else {
            $buttons = [
                'edit' => [
                    'Save changes' => 'do_and_show',
                ],
                'create' => [
                    'Create' => 'do_and_show',
                ]
            ];
        }

        return $buttons;
    }

    /**
     * The buttons values.
     *
     * @return array
     */
    public function buttons_values()
    {
        return Request::isMethod('POST')
            ? array_values($this->buttons()['create'])
            : array_values($this->buttons()['edit']);
    }
}