<?php

namespace App\Http\Requests;

use App\Utilities\SubmitForm;
use Illuminate\Validation\Rule;
use App\Utilities\GeneratePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'ids' => 'sometimes|exists:users,id',
            'name' => 'sometimes|required|alpha_num|max:100',
            'email' => [
                'sometimes','required', 'email', 'max:100',
                Rule::unique('users')->ignore($this->user)
            ],
            SubmitForm::get()->button_name => [
                'sometimes', 'required',
                Rule::in(SubmitForm::get()->buttons_values())
            ],
        ];

        if(Auth::user()->is_admin) {
            $rules['role_id'] = ['sometimes', 'exists:roles,id' ];
            $rules[GeneratePassword::get()->name] = [
                'sometimes', 'required',
                Rule::in(GeneratePassword::get()->values())
            ];
            if($this->generatePassword() == 'manually_generate') {
                $rules['password'] = ['required', 'min:8'];
            }
        }

        if(! Auth::user()->is_admin) {
            $rules['password'] = ['nullable', 'confirmed', 'min:8'];
        }

        return $rules;
    }

    /**
     * The generate pssword value.
     *
     * @return [type] [description]
     */
    private function generatePassword()
    {
        $radioName = GeneratePassword::get()->name;

        return $this->$radioName;
    }
}
