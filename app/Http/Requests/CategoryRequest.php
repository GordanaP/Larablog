<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Rules\AlphaNumDashSpace;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'ids' => 'sometimes|exists:categories,id',
            'name' => [
                'sometimes', 'required', 'min:2', 'max:50',
                Rule::unique('categories')->ignore($this->category),
                new AlphaNumDashSpace
            ],
            'handle_submission' => [
                'sometimes', 'required',
                Rule::in(['do_and_show', 'do_and_repeat'])
            ],
        ];
    }
}
