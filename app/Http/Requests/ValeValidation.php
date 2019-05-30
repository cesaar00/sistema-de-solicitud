<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValeValidation extends FormRequest
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
    { //el unique hace la validacion.
        return [
            'litros'=> 'required|max:255',
            'id_chofer'=>'required|max:255|unique:vales,id_chofer,'.$this->route('id'),
            'id_automovil'=> 'required|max:255',
            'id_admin'=> 'required|max:255',
            'estado'=> 'required|max:255'


        ];
    }
    public function messages()
    {
        return [
            'litros.required'=> 'Introduzca cantidad de litros',
            'id_chofer.required'=> 'Introduzca id de chofer',
            'id_automovil.required'=> 'Introduzca id de automovil',
            'id_admin.required'=> 'Introduzca id del administrador',
            'estado.required'=> 'Introduzca el estado',

        ];
    }
}
