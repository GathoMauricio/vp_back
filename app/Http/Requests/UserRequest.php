<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ];
    }

    public function messages()
    {
        return [
            'role_id.required' => 'Seleccione in rol para e usuario',
            'name.required' => 'Ingrese un nombre al usuario.',
            'email.required' => 'Ingrese un email al usuario.',
            'email.email' => 'Ingrese un email válido.',
            'password.required' => 'Ingrese una contraseña al usuario.',
            'password.min' => 'La contraseña debe contener mínimo 6 caracteres.',
        ];
    }
}
