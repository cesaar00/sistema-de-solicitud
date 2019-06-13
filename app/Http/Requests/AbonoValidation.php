<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbonoValidation extends FormRequest
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
            'folio'=> 'required|max:255',
            'monto'=> 'required|max:255',
            'fecha'=>'required|max:255',
            'estado'=> 'required|max:255',
            'id_tarjeta'=> 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'folio.required'=> 'Introduzca el Folio',
            'monto.required'=> 'Introduzca Monto Cargado',
            'fecha.required'=> 'Introduzca la Fecha del abono',
            'estado.required'=> 'Introduzca el estado',
            'id_tarjeta.required'=> 'Introduzca el benefactor',


        ];
    }
}
