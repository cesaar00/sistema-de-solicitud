<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_tarjetas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('monto');
            $table->bigInteger('id_tarjeta');
            $table->String('tipo_gasolina');
            $table->bigInteger('id_vehiculo');
            $table->String('fecha_carga');
            $table->bigInteger('litros');
            $table->smallInteger('aprobado')->default(0);
            $table->timestamps();

        });

        Schema::create('relacion_tarjeta_historial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('monto');
            $table->string('id_tarjeta');
            $table->string('tipo_gasolina');
            $table->string('id_vehiculo');
            $table->string('fecha_carga');
            $table->bigInteger('litros');
            $table->smallInteger('aprobado')->default(0);
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
        Schema::dropIfExists('relacion_tarjetas');
        Schema::dropIfExists('relacion_tarjeta_historial');
    }
}
