<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class abono extends Model
{
    //
    protected $fillable=[
        'id',
        'folio',
        'monto',
        'fecha',
        'id_tarjeta',



    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
