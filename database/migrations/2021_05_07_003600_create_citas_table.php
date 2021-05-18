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
            $table->date('date_taken'); //Fecha cita
            $table->time('hour_taken'); //hora tomada
            $table->char('n_control', 50); //Numero de control
            $table->string('name', 100); //nombre
            $table->string('asigned_to'); //Asignado a
            $table->timestamps(); //create at update att
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
