<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoValidation extends FormRequest
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

            'nombre_vehiculo'=> 'required|max:255',
            'capacidad_tanque_gasolina'=> 'required|max:255',
            'tipo_gasolina'=> 'required|max:255',
            'modelo_vehiculo'=> 'required|max:255',
            'descripcion_vehiculo'=> 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'nombre_vehiculo.required'=> 'Introduzca el nombre del vehiculo',
            'capacidad_tanque_gasolina.required'=> 'Introduzca la Capacidad del Tanque de Gasolina',
            'tipo_gasolina.required'=> 'Introduzca el tipo de Gasolina del vehiculo',
            'modelo_vehiculo.required'=> 'Introduzca El Modelo del vehiculo',
            'descripcion_vehiculo.required'=> 'Introduzca Descripcion del vehiculo'

        ];
    }
}
