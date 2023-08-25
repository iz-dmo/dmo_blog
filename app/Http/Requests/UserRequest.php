<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',

        ];
    }
    public function messages(){
        return[
            'name.required'=>'*Required',
            'email.required'=>'*Required',
            'password.required'=>'*Required',
            'role.required'=>'*Required',
        ];
    }
}
