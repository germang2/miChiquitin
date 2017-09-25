<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->string('id');
			$table->string('nombre');
			$table->string('descripcion');
			$table->float('precio_basico', 8,2);
			$table->integer('cantidad');
			$table->integer('id_proveedor')->unsigned();
			$table->date('fecha');
            $table->timestamps();
			
			$table->primary('id');
			$table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
			// id_proveedor es una llave foranea del id en la tabla proveedores
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
