<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_factura')->unsigned(); //->index();
            $table->string('id_articulo', 50); //->index();
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio_venta', 53, 2)->unsigned();

            $table->foreign('id_factura')->references('id')->on('factura');
            // $table->foreign('id_articulo')->references('id_articulo')->on('articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_producto');
    }
}
