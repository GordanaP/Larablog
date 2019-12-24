<?php

namespace App\Http\Requests;

use App\Utilities\SubmitForm;
use Illuminate\Validation\Rule;
use App\Rules\CanNotReplyToThemselves;
use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required|max:500',
            'commenter_id' => [
                'required','exists:users,id',
                new CanNotReplyToThemselves($this->route('comment'))
            ],
            SubmitForm::get()->button_name => [
                'sometimes', 'required',
                Rule::in(SubmitForm::get()->buttons_values())
            ],
        ];
    }
}
