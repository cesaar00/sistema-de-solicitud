<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    protected $fillable=[
        'id',
        'nombre_automovil',
        'capacidad_tanque_gasolina',
        'tipo_gasolina',
        'modelo_automovil',
        'descripcion_automovil',


    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
