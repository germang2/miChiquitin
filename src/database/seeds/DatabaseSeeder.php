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
        //$this->call(rootSeeder::class);
            DB::table('users')->insert([
            	'name' 		=> 	'root',
            	'email'		=>	'root@gmail.com',
            	'password'	=>	bcrypt('321654'),
            	'tipo_rol'	=>	'root',
            	'apellidos'	=>	'root',
            	'direccion'	=>	'Pereira',
            	'edad'		=>	30,
          	'credito_maximo' => 0.00,
            	'credito_actual' => 0.00
            ]);
            DB::table('empresa')->insert([
            	'nombre' 		=> 	'michiquitin',
            	'telefono' => '34453455',
              'direccion' => 'cra 23 cll 4'
            ]);
        }
    }
