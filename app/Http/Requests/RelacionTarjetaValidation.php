<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelacionTarjetaValidation extends FormRequest
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
            'monto'=> 'required|max:255',
            'id_tarjeta'=> 'required|max:255',
            'tipo_gasolina'=>'required|max:255',
            'id_vehiculo'=> 'required|max:255',
            'fecha_carga'=> 'required|max:255',
            'litros'=> 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'monto.required'=> 'Introduzca el Monto Cobrado',
            'id_tarjeta.required'=> 'Introduzca id de tarjeta',
            'tipo_gasolina.required'=> 'Introduzca el tipo de gasolina cargado',
            'id_vehiculo.required'=> 'Introduzca id del vehiculo',
            'fecha_carga.required'=> 'Introduzca la fecha de carga',
            'litros.required'=>'Introduzca cantidad de litros cargados'

        ];
    }
}
