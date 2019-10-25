<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\validation\Rule;


class VerifyRestaurantProfileInput extends FormRequest
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
            'owner'  => 'required|min:4',
            'email' => ['required', 
             Rule::unique('logininfo')->ignore(session('userDetails')->userID, 'userID'),],
            'address' => 'required|max:255',
            'phone' => 'required|max:14|min:11',
            'openhh'  => 'required',
            'openmm'  => 'required',
            'closehh'  => 'required',
            'status'  => 'required',
            'closemm'  => 'required',
            'openPeriod' => 'required',
            'closePeriod' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'restaurantName.required' => 'Restaurant name value cannot be empty',
            'restaurantName.min' => 'Name must be at least 4 characters long'
        ];
    }
}
