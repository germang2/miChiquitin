<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class rootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
        	'name' 		=> 	'root',
        	'email'		=>	'root@gmail.com',
        	'password'	=>	bcrypt('321654'),
        	'id_tipo'	=>	13442456,
        	'tipo_rol'	=>	'root',
        	'apellidos'	=>	'root',
        	'direccion'	=>	'Pereira',
        	'edad'		=>	30,
        	'credito_maximo' => 0.00,
        	'credito_actual' => 0.00
        ]);*/

        DB::table('users')->insert([
          'name' => str_random(5),
          'email' => str_random(3).'@example.com',
          'password' => bcrypt('123456'),
          'id_tipo'	=>	1,
        	'tipo_rol'	=>	str_random(5),
        	'apellidos'	=>	str_random(5),
        	'direccion'	=>	'Pereira',
        	'edad'		=>	rand(18,30),
        	'credito_maximo' => rand(300000, 1000000),
        	'credito_actual' => rand(100000, 200000)
        ]);
    }
}
