<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pago')->nullable();
            $table->date('fecha_orden');
            $table->float('valor_pagar');
            $table->integer('id_pedido')->unsigned();
            $table->integer('id_plan_pago')->unsigned();
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
        Schema::dropIfExists('pago_proveedores');
    }
}
