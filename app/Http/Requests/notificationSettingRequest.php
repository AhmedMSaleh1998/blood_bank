<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class notificationSettingRequest extends FormRequest
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
            'governorate_ids' => 'required | array | min:1',
            'governorate_ids.*' => 'required | exists:governorates,id',
            'blood_type_ids' => 'required | array | min:1',
            'blood_type_ids.*' =>'required | exists:blood_types,id',
        ];
    }
}
