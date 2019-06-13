<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mantenimiento extends Model
{
    //
    protected $fillable=[
        'id',
        'id_vehiculo',
        'descripcion',
        'kilometraje',
        'fecha',
        'fecha_prox',
        'observaciones',
        'costo',


    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
