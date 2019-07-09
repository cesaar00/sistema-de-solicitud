<?php

use Illuminate\Database\Seeder;
//use phpDocumentor\Reflection\Types\Str;
use Illuminate\Support\Str;

class tarjetaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tarjetas')->insert([
            'numero_tarjeta' => '3498-2310-4669-2134',
            'tipo_monedero'=> 'Debito',
            'saldo'=> 1700,
            'benefactor'=> 'Hidrosina'
        ]);
         DB::table('tarjetas')->insert([
            'numero_tarjeta' => '1234-5678-9011-2233',
            'tipo_monedero'=> 'Debito',
            'saldo'=> 1700,
            'benefactor'=> 'Cantu'
        ]);

        DB::table('tarjetas')->insert([
            'numero_tarjeta' => '9980-4567-8809-2356',
            'tipo_monedero'=> 'Credito',
            'saldo'=> 1700,
            'benefactor'=> 'Garel'
        ]);
    }
}
