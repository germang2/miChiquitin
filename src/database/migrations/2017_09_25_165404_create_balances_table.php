<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->decimal('efectivo', 15, 2);
            $table->decimal('cuentas_cobrar', 15, 2);
            $table->decimal('cuentas_pagar', 15, 2);
            $table->decimal('impuestos', 15, 2);
            $table->decimal('activos', 15, 2);
            $table->decimal('pasivos', 15, 2);
            $table->decimal('total', 15, 2);
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
        Schema::dropIfExists('balances');
    }
}
