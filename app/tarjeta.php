<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarjeta extends Model
{
    //
    protected $fillable=[
        'id',
        'tarjeta',
        'tipo_monedero',
        'saldo',
        'benefactor',


    ];

    protected $gurded =[
        'id'
    ];

    public $timestap=true;
}
