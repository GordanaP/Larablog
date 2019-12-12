<?php

namespace App\Http\Requests;

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
            'handle_submission' => [
                'sometimes', 'required',
                Rule::in(['do_and_show', 'do_and_repeat'])
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

    private function generatePassword()
    {
        $radioName = GeneratePassword::get()->name;

        return $this->$radioName;
    }
}
