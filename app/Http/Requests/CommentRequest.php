<?php

namespace App\Http\Requests;

use App\Utilities\SubmitForm;
use App\Rules\MustBePublished;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'ids' => 'sometimes|exists:articles,id',
            'comment' => 'sometimes|required|max:500',
            'commenter_id' => 'sometimes|required|exists:users,id',
            'commentable_id' => [
                'sometimes',
                'required',
                new MustBePublished
            ],
            SubmitForm::get()->button_name => [
                'sometimes', 'required',
                Rule::in(SubmitForm::get()->buttons_values())
            ],
        ];
    }
}
