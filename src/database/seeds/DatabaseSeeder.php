<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(rootSeeder::class);
        $this->call(articulos::class);
        $this->call(factura_producto::class);
        $this->call(factura::class);
        $this->call(plan_pago::class);
        $this->call(proveedores::class);
        $this->call(usuario::class);
    }
}
