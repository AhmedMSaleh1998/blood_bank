<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminEditClientRequest extends FormRequest
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
        $id = $this->route('client');
        return [
            'name'      => 'string|required|regex:/^\S*$/u',
            'email'     => 'email |required|unique:clients,email,' .$id,
            'd_o_b'     => 'required|date|before:today',
            'blood_type_id'=> 'required',
            'last_donnation_date' => 'date|before:today',
            'city_id'  => 'required',
            'phone'     => 'string|required|unique:clients,phone,' .$id .'|min:11',
        ];
    }
}
