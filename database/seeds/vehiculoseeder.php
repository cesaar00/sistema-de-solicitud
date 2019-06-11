<?php

use Illuminate\Database\Seeder;

class vehiculoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehiculos')->insert([
            'nombre_vehiculo' => 'Ambulancia',
            'capacidad_tanque_gasolina'=> 30,
            'tipo_gasolina' => 'Diesel',
            'modelo_vehiculo'=> '2010',
            'descripcion_vehiculo'=> 'muy bonito todo',
        ]);
        DB::table('vehiculos')->insert([
            'nombre_vehiculo' => 'Teletona',
            'capacidad_tanque_gasolina'=> 45,
            'tipo_gasolina' => 'Magna',
            'modelo_vehiculo'=> '2001',
            'descripcion_vehiculo'=> 'muy bello todo',
        ]);
        DB::table('vehiculos')->insert([
            'nombre_vehiculo' => 'PickUp',
            'capacidad_tanque_gasolina'=> 40,
            'tipo_gasolina' => 'Premium',
            'modelo_vehiculo'=> '2013',
            'descripcion_vehiculo'=> 'muy hermoso todo',
        ]);
    }
}
