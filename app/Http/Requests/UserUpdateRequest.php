<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|unique:users',
            'role'=>'required',
            'password'=>'min:8|confirmed',
            'password_confirmation'=>'required|same:password'

        ];
    }
    public function messages(){
        return[
            'name.required'=>'*Required',
            'email.required'=>'*Required',
            'role.required'=>'*Required',
            'password.required'=>'*Required',
            'password_confirmation.required'=>'* Not Match Password',
        ];
    }
}
