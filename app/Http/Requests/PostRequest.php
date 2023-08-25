<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id'=>'required',
            'user_id'=>'required',
            'photo'=>'required',
            'description'=>'required',

        ];
    }
    public function messages(){
        return[
            'name.required'=>'*Required',
            'category_id.required'=>'*Required',
            'user_id.required'=>'*Required',
            'photo.required'=>'*Required',
            'description.required'=>'*Required',

        ];
    }
}
