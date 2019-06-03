<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarjeta extends Model
{
    //
    protected $fillable=[
        'id',
        'tipo_monedero',
        'saldo',
        'benefactor',


    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
