<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(roles::class);
        $this->call(tarjetaseeder::class);
        $this->call(vehiculoseeder::class);
        //$this->call(relaciontarjeta::class);
       // $this->call(abonoseeder::class);
       //$this->call(mantenimientoseeder::class);

    }
}
