<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePazYSalvosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paz_y_salvos', function (Blueprint $table) {
            $table->increments('id_paz_y_salvo');
            $table->integer('id_deuda')->unsigned();
            $table->date('fecha');
            $table->time('hora');
            $table->string('concepto');

            $table->foreign('id_deuda')->references('id_deuda')->on('deudas');

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
        Schema::dropIfExists('paz_y_salvos');
    }
}
