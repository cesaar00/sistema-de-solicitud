<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelacionTarjeta extends Model
{
    //
    protected $fillable=[
        'id',
        'monto',
        'id_tarjeta',
        'tipo_gasolina',
        'id_vehiculo',
        'fecha_carga',
        'litros'


    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
