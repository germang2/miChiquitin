<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pago')->nullable();
            $table->date('fecha_prenomina');
            $table->float('base');
            $table->integer('horas_extras')->nullable();
            $table->float('salud')->nullable();
            $table->float('pension')->nullable();
            $table->float('aux_transporte')->nullable();
            $table->float('neto');
            $table->float('arl')->nullable();
            $table->integer('id_empleado')->unsigned();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('nominas');
    }
}
