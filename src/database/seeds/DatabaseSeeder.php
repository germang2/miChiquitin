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
        $this->call(Root::class);
        $this->call(Proveedores::class);
        $this->call(Articulos::class);
        $this->call(Users::class);
        $this->call(Clientes::class);
    }
}
