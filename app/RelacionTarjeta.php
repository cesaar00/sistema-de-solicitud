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
        'litros',
        'aprobado'

    ];

    protected $gurded =[
        'id'
    ];

    public $timestamp= true;

    public function vehiculo()
    {
        return $this->belongsTo(vehiculo::class, 'id_vehiculo');
    }

    public function tarjeta()
    {
        return $this->belongsTo(tarjeta::class, 'id_tarjeta');
    }
}
