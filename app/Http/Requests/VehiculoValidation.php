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

            'nombre_automovil'=> 'required|max:255',
            'capacidad_tanque_gasolina'=> 'required|max:255',
            'tipo_gasolina'=> 'required|max:255',
            'modelo_automovil'=> 'required|max:255',
            'descripcion_automovil'=> 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'nombre_automovil.required'=> 'Introduzca el nombre del Automovil',
            'capacidad_tanque_gasolina.required'=> 'Introduzca la Capacidad del Tanque de Gasolina',
            'tipo_gasolina.required'=> 'Introduzca el tipo de Gasolina del Automovil',
            'modelo_automovil.required'=> 'Introduzca El Modelo del Automovil',
            'descripcion_automovil.required'=> 'Introduzca Descripcion del Automovil'

        ];
    }
}
