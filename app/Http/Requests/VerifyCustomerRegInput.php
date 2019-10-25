<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCustomerRegInput extends FormRequest
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
            'name'  => 'required|min:4',
            'email' => 'required|email|unique:logininfo',
            'address' => 'required|max:255',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required|max:14|min:11',
            'password' => 'required|min:8|max:20|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name cannot be empty',
            'name.min' => 'Name must be at least 4 characters long',
            'gender.required' => 'Select your gender',
            'dob.required' => 'Select your Date of Birth',
        ];
    }
}
