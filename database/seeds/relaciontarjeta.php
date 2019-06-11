<?php

use Illuminate\Database\Seeder;

class relaciontarjeta extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('relacion_tarjetas')->insert([
            'monto'=>1200,
            'id_tarjeta'=> 1,
            'tipo_gasolina'=> 'Diesel',
            'id_vehiculo'=> 1,
            'fecha_carga'=> '10-mar-2019',
            'litros'=> 20
        ]);
        DB::table('relacion_tarjetas')->insert([
            'monto'=>1200,
            'id_tarjeta'=> 2,
            'tipo_gasolina'=> 'Magna',
            'id_vehiculo'=> 2,
            'fecha_carga'=> '10-mayo-2019',
            'litros'=> 20
        ]);
        DB::table('relacion_tarjetas')->insert([
            'monto'=>1200,
            'id_tarjeta'=> 3,
            'tipo_gasolina'=> 'Premium',
            'id_vehiculo'=> 3,
            'fecha_carga'=> '10-abril-2019',
            'litros'=> 20
        ]);
    }
}
