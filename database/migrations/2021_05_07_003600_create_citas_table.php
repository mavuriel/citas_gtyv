<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->char('service', 50); //Tipo de servicio
            $table->date('date_taken'); //Fecha cita
            $table->time('hour_taken'); //Hora tomada
            $table->char('n_control', 50); //Numero de control
            $table->string('name', 100); //Nombre del alumno
            $table->string('asigned_to'); //Asignado a
            $table->timestamps(); //create at - update at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
