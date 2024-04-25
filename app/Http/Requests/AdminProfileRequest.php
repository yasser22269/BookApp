<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
            'email' => 'required|email|unique:admins,email,'.$this->id,
            'name' => 'required',
            'password' => 'nullable|confirmed|min:8',
            'password_confirmation' => 'required_with:password|same:password'
        ];
    }

    public function messages()
    {
        return [

            // 'email.required' => 'يجب الدخال البريد الالكتروني ',
            // 'email.email' => 'صيغة البريد الالكتروني غير صحيحة ',
            // 'password.required' => 'يجب الدخال كلمة المرور'

            ];
    }
}
