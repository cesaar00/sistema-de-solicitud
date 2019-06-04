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
        return false;
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
            'tipo_monedero'=> 'Introduzca Tipo de Monedero',
            'saldo'=> 'Introduzca El saldo',
            'benefactor'=> 'Introduzca Nombre del Benefactor'

        ];
    }
}
