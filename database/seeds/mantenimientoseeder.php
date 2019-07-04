<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class mantenimientoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mantenimientos')->insert([
            'id_vehiculo' => 1,
            'vehiculo'=>'Ambulancia',
            'descripcion'=> 'Tiene una falla',
            'kilometraje'=> 14000,
            'fecha'=> Date::createFromDate('2019/04/10'),
            'fecha_prox'=> Date::createFromDate('2020/04/10'),
            'agencia'=> 'chevrolet',
            'observaciones'=> 'detalle en manguera',
            'costo'=> 23000
        ]);
        DB::table('mantenimientos')->insert([
            'id_vehiculo' => 2,
            'vehiculo'=> 'Teletona',
            'descripcion'=> 'Tiene una falla',
            'kilometraje'=> 14000,
            'fecha'=> Date::createFromDate('2019/04/10'),
            'fecha_prox'=> Date::createFromDate('2020/04/10'),
            'agencia'=> 'chevrolet',
            'observaciones'=> 'detalle en valvula',
            'costo'=> 23000
        ]);
        DB::table('mantenimientos')->insert([
            'id_vehiculo' => 3,
            'vehiculo'=> 'PickUP',
            'descripcion'=> 'Tiene una falla',
            'kilometraje'=> 14000,
            'fecha'=> Date::createFromDate('2019/04/10'),
            'fecha_prox'=> Date::createFromDate('2020/04/10'),
            'agencia'=> 'chevrolet',
            'observaciones'=> 'detalle en manguera',
            'costo'=> 23000
        ]);

    }
}
