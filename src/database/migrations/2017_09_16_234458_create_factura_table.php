<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('fecha');
            $table->integer('id_cliente');
            $table->integer('id_plan_pago')->unsigned();
            $table->integer('cuotas')->unsigned();
            $table->integer('valor_cuota')->unsigned();
            $table->integer('id_vendedor');
            $table->decimal('valor_total', 53, 2)->unsigned();
            $table->string('estado', 50);

            // $table->foreign('id_cliente')->references('id')->on('clientes');
            // $table->foreign('id_vendedor')->references('id')->on('vendedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
