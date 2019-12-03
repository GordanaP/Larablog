<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            $rules['generate_password'] = [
                'sometimes', 'required',
                Rule::in(['auto_generate', 'manually_generate', 'do_not_change'])
            ];
            if($this->generate_password == 'manually_generate') {
                $rules['password'] = ['required', 'min:8'];
            }
        }

        if(! Auth::user()->is_admin) {
            $rules['password'] = ['nullable', 'confirmed', 'min:8'];
        }

        return $rules;
    }
}
