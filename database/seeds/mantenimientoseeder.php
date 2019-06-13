<?php

use Illuminate\Database\Seeder;

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
            'id_vehiculo'=>1,
            'descripcion'=> 'Tiene una falla',
            'kilometraje'=> 14000,
            'fecha'=> '10-abril-2019',
            'fecha_prox'=> '10-mar-2020',
            'observaciones'=> 'quedara todo bien',
            'costo'=> 23000
        ]);
        DB::table('mantenimientos')->insert([
            'id_vehiculo'=> 2,
            'descripcion'=> 'Tiene una falla',
            'kilometraje'=> 14000,
            'fecha'=> '10-abril-2019',
            'fecha_prox'=> '10-mar-2020',
            'observaciones'=> 'quedara todo bien',
            'costo'=> 23000
        ]);
        DB::table('mantenimientos')->insert([
            'id_vehiculo'=> 3,
            'descripcion'=> 'Tiene una falla',
            'kilometraje'=> 14000,
            'fecha'=> '10-abril-2019',
            'fecha_prox'=> '10-mar-2020',
            'observaciones'=> 'quedara todo bien',
            'costo'=> 23000
        ]);

    }
}
