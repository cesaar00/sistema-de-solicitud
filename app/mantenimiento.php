<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mantenimiento extends Model
{
    //
    protected $fillable=[
        'id_vehiculo',
        'vehiculo',
        'descripcion',
        'kilometraje',
        'fecha',
        'fecha_prox',
        'agencia',
        'observaciones',
        'costo',
        'tipo'

    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
