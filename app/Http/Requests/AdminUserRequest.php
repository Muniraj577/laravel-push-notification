<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'active' => 'required',
            'password' => 'required|confirmed|min:8',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter valid email address.',
            'email.unique' => 'Email has already been taken.',
            'password.required' => 'Password field is required',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be of at least 8 characters.',
            'roles.required' => 'At least one role must be selected.',
        ];
    }
}
