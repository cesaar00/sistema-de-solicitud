<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    protected $fillable=[
        'id',
        'nombre_vehiculo',
        'capacidad_tanque_gasolina',
        'tipo_gasolina',
        'modelo_vehiculo',
        'descripcion_vehiculo',


    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
