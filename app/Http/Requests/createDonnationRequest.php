<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createDonnationRequest extends FormRequest
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
            'patient_name'           =>'string|required',
            'patient_age'            =>'required|integer',
            'blood_type_id'  =>'required',
            'patient_phone'   =>'string|required|unique:clients,id,'.auth('api')->user()->id.'|min:11',
            'bags_num'       =>'required|numeric',
            'longitude'      =>'required|numeric',
            'lattitude'       =>'required|numeric',
            'hospital_name'  =>'string|required',
            'details'        =>'string|required',
            'client_id'      =>'string|required',
        ];
    }
}
