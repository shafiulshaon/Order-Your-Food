<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRestaurantRegInput extends FormRequest
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
            'restaurantName'  => 'required|min:4',
            'email' => 'required|email|unique:logininfo',
            'branch' => 'required|min:4',
            'address' => 'required|max:255',
            'owner' => 'required|min:4',
            'phone' => 'required|max:14|min:11',
            'password' => 'required|min:8|max:20|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'restaurantName.required' => 'Restaurant name cannot be empty',
            'restaurantName.min' => 'Name must be at least 4 characters long',
        ];
    }
}
