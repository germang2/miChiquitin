<?php

use App\Models\Contabilidad\Varcontrol;
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
      $this->call(empresaSeeder::class);
      $this->call(varcontrolsTableSeeder::class);
      $this->call(adminSeed::class);
      factory(App\Models\Usuarios\Cliente::class,10)->create();
      factory(App\Models\Usuarios\Empleado::class,15)->create();  //este factory no generra la foreign key para id_usuario


      $this->call(Planpago::class);


      
      //factory(App\Models\Inventario\Pedido::class, 40)->create();


    }
  }
