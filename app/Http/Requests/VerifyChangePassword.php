<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyChangePassword extends FormRequest
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
            'currentPassword' => 'required|same:thisPassword',
            'password' => 'required|min:8|max:20|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'The new password field is required.',
            'currentPassword.same' => 'The Current password did not match.'
        ];
    }
}
