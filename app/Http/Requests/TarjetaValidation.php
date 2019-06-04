<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarjetaValidation extends FormRequest
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
            //
            'tipo_monedero'=> 'required|max:255',
            'saldo'=>'required|max:255|unique:tarjetas,saldo,'.$this->route('id'),
            'benefactor'=> 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'tipo_monedero.required'=> 'Introduzca Tipo de Monedero',
            'saldo.required'=> 'Introduzca El saldo',
            'benefactor.required'=> 'Introduzca Nombre del Benefactor'

        ];
    }
}
