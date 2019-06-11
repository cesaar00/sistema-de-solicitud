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
            'numero_tarjeta' => 3498231046692134,
            'tipo_monedero'=> 'Debito',
            'saldo'=> 23000,
            'benefactor'=> 'Hidrosina'
        ]);
         DB::table('tarjetas')->insert([
            'numero_tarjeta' => 1234567890112233,
            'tipo_monedero'=> 'Debito',
            'saldo'=> 30909,
            'benefactor'=> 'Cantu'
        ]);

        DB::table('tarjetas')->insert([
            'numero_tarjeta' => 9980456788092356,
            'tipo_monedero'=> 'Credito',
            'saldo'=> 45000,
            'benefactor'=> 'Garel'
        ]);
    }
}
