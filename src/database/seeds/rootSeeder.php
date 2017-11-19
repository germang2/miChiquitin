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
        /* DB::table('users')->insert([
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
        ]);  */

            DB::table('proveedores')->insert([
            'id_tipo'       =>  'CC',
            'fecha'     =>_ '2017/11/18',
            'representante_legal'   => 'Sambel',
            'id_representante'  =>   1088452750,
            'telefono'  =>  3126439621,
            'razon_social'  =>  'Subir a 2k',
            'per_jur'   =>  'Natural',
            'departamento'      =>  'Risaralda',
            'ciudad' => 'Pereira',
            'borrado' => 2
        ]);
    }
}
