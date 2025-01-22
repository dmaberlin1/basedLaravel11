<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
//        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:40', 'min:2'],
            'email' => ['email', 'required', 'unique:users,email'],
//https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
            'password' => ['required', 'min:6', 'regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"', 'confirmed:password_confirmation'],
            'agree' => ['required']
        ];
    }

    public function messages(): array
    {
        return ['name.required' => 'Oops, name is required',
            'email.unique:users,email' => 'Oops, email must be unique',
        ];
    }
    public function attributes()
    {
        return [
            'password'=>'<b>Password</b>'
        ];
    }
}
