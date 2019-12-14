<?php

namespace App\Http\Requests;

use App\Utilities\SubmitForm;
use Illuminate\Validation\Rule;
use App\Rules\AlphaNumDashSpace;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'ids' => 'sometimes|exists:roles,id',
            'name' => [
                'sometimes', 'required', 'min:2', 'max:50',
                Rule::unique('roles')->ignore($this->role),
                new AlphaNumDashSpace
            ],
            SubmitForm::get()->button_name => [
                'sometimes', 'required',
                Rule::in(SubmitForm::get()->buttons_values())
            ],
        ];
    }
}
