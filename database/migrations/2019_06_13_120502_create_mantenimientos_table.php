<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_vehiculo');
            $table->string('vehiculo');
            $table->string('descripcion',191);
            $table->bigInteger('kilometraje');
            $table->date('fecha');
            $table->date('fecha_prox');
            $table->string('agencia',191);
            $table->string('observaciones',191);
            $table->string('costo');
            $table->boolean('tipo')->default(false);
            $table->smallInteger('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
}
