<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Usuarios\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'id_tipo'	=>	13442456,
        'tipo_rol'	=>	'root',
        'apellidos'	=>	'root',
        'direccion'	=>	'Pereira',
        'edad'		=>	30,
        'credito_maximo' => 0.00,
        'credito_actual' => 0.00
    ];
});

//Empresaaa
//Contrato
$factory->define(App\Models\Usuarios\Empleado::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id_usuario' => function(){
            return factory(App\Models\Usuarios\User::class)->create()->id;
        },
        'id_empresa' => 1,
        'id_contrato' => 1,
        'estado' => 'Activo',
        'cargo' => $faker->word,
        'area' => $faker->word,
    ];
});

$factory->define(App\Models\Inventario\Pedido::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id_articulo' => rand(1,4),
        'id_proveedor' => rand(1,3),
        'cantidad' => rand(50,80),
        'costo_total' => rand(100000,100000000) / 100,
        'fecha' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()) ,
        'estado' => 'EnEspera',
    ];
});




