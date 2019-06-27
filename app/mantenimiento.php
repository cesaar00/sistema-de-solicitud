<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mantenimiento extends Model
{
    //
    protected $fillable=[
        'vehiculo',
        'descripcion',
        'kilometraje',
        'fecha',
        'fecha_prox',
        'observaciones',
        'costo',
        'tipo'

    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
