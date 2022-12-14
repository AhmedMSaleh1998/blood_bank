<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class EditProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'string|required|unique:clients,id,'.auth('api')->user()->id.'|regex:/^\S*$/u',
            'email'     => 'email |required|unique:clients,id,'.auth('api')->user()->id,
            'd_o_b'     => 'date|before:today',
            'blood_type_id'=> 'required',
            'last_donnation_date' => 'date|before:today',
            'city_id'  => 'required',
            'phone'     => 'string|required|unique:clients,id,'.auth('api')->user()->id.'|min:11',
            'password'  => ['required','confirmed',Password::min(8)->mixedCase()
             ->letters()->numbers()->symbols()->uncompromised()],
        ];

    }

    public function message(){
        return [
            'name.string' => 'Name should be string',
            'name.required' => 'A Name Field is required',
        ];
    }
}
