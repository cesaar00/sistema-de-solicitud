<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vale extends Model
{
    //protected $table = 'Vale';

    protected $fillable=[
        'litros',
        'estado',
        'id_chofer',
        'id_automovil',
        'id_admin',

    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;
}
