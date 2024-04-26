<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>"required|max:190",
            'phone'=>"required|max:15|unique:users,phone",
            'user_name'=>"required|max:55|unique:users,user_name",
            'email'=>"required|unique:users,email",
            'password'=>"required|min:8|max:20",
            'gender'=>"required|in:male,female",
            //--------------------------
            'Child'=> 'required|array|min:1',
            'Child.*.name'=>"required|max:190",
            'Child.*.user_name'=>"required|max:190||unique:children,user_name",
            'Child.*.age'=>"required|numeric",
            'Child.*.password'=>"required|min:8|max:20",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
