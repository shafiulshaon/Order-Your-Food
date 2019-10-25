<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\validation\Rule;

class VerifyAdminProfileInput extends FormRequest
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
            'email' => ['required', 
             Rule::unique('logininfo')->ignore(session('userDetails')->userID, 'userID'),],
            'address' => 'required|max:255',
            'phone' => 'required|max:14|min:11',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This value cannot be empty',
            'name.min' => 'Name must be at least 4 characters long'
        ];
    }
}
