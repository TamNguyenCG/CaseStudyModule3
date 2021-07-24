<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|unique:users,name|min:6|max:32|regex:/^[a-zA-Z0-9 ]*$/',
            "email" => "required|unique:users,email|email:filter|min:15|max:32",
            "password" => "required|min:6|max:32|"
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Username field is required',
            'name.min' => "Username must over 6 characters",
            'name.max' => "Username is too long, required under 32 characters",
            'name.unique' => "Email already has been taken",
            'name.regex' => "Special Character is forbidden",
            'email.required'=>'Email field is required',
            'email.email' => "Wrong type of email address",
            'email.unique' => "Email already has been taken",
            'email.min'=>"Invalid email",
            'email.max' => "Invalid email",
            'password.required' => 'Password is required',
            'password.min' => 'Password is too short',
            'password.max' => 'Password is too long',
        ];
    }
}
