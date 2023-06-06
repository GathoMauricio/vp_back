<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'client_id' => 'required',
            'usuario_id' => 'required',
            'prioridad' => 'required',
            'clase_id' => 'required',
            'problematica' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'No se ha seleccionad un cliente.',
            'usuario_id.required' => 'No se ha seleccionado un usuario.',
            'prioridad.required' => 'No se ha seleccionado una prioridad.',
            'clase_id.required' => 'No se ha seleccionado una clase.',
            'problematica.required' => 'No se ha indicado una problemática.',
        ];
    }
}
