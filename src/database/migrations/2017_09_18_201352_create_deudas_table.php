<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudas', function (Blueprint $table) {
            $table->increments('id_deuda');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_plan')->unsigned();
            $table->integer('id_factura')->unsigned();
            $table->float('valor_pagado');
            $table->float('valor_a_pagar');
            $table->date('plazo_credito');
            $table->string('estado');

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_plan')->references('id_plan')->on('planes');
            $table->foreign('id_factura')->references('id_factura')->on('facturas');

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
        Schema::dropIfExists('deudas');
    }
}
