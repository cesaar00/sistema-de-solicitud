<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MantenimientoValidation extends FormRequest
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
            'id_vehiculo'=> 'required|max:255',
            'descripcion'=> 'required|max:255',
            'kilometraje'=>'required|max:255',
            'fecha'=> 'required|max:255',
            'fecha_prox'=> 'required|max:255',
            'agencia'=> 'required|max:255',
            'observaciones'=> 'required|max:255',
            'costo'=> 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'id_vehiculo.required'=> 'Introduzca el Vehiculo',
            'descripcion.required'=> 'Introduzca una Descripcion del problema',
            'kilometraje.required'=> 'Introduzca el Kilometraje',
            'fecha.required'=> 'Introduzca la fecha del mantenimiento',
            'fecha_prox.required'=> 'Introduzca la fecha del proximo mantenimiento',
            'agencia.required'=> 'Introduzca la agencia',
            'observaciones.required'=> 'Introduzca las observaciones',
            'costo.required'=> 'Introduzca el costo',


        ];
    }
}
