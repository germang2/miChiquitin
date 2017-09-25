<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaDeuda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_deuda', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('id_factura')->unsigned()->index();
            $table->decimal('abono', 53, 2)->default(0.0);
            $table->dateTime('fecha');
            $table->time('hora');

            $table->foreign('id_factura')->references('id')->on('factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_deuda');
    }
}
