<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioValidation extends FormRequest
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
            'name'=> 'required|max:255',
            'lastname'=>'required|max:255',
            'email'=> 'required|max:255',
            'password'=> 'required|max:255|same:password1'

        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Introduzca cantidad de litros',
            'lastname.required'=> 'Introduzca id de chofer',
            'email.required'=> 'Introduzca id de automovil',
            'password.required'=> 'Introduzca contraseña',
            'password.same'=> 'Las contraseñas no coinciden'

        ];
    }
}
