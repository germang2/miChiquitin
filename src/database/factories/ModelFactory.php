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
        'id_tipo' => $faker->unique()->rand(100, 1000),
        'apellidos' => $faker->lastname,
        'direccion'=> $faker->address,
        'credito_maximo' => $faker->numberBetween($min = 1000, $max = 6000),
        'credito_actual' => $faker->numberBetween($min = 1000, $max = 4000),
        'edad'=> $faker->randomNumber(2),
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


$factory->define(App\Models\Usuarios\Cliente::class, function (Faker\Generator $faker){
    return [
        'genero' => 'masculino',
        'ciudad' => $faker->city,
        'id_usuario'=> function () {
            return factory(App\Models\Usuarios\User::class)->create(['tipo_rol' => 'cliente'])->id;
        },
        'numberphone' => function(array $cliente){return factory(App\Models\Usuarios\Telefono::class)->create(['id_usuario'=>$cliente['id_usuario']])->Id_Telefono;}
    ];
});

//el factory de telefono no sirve
$factory->define(App\Models\Usuarios\Telefono::class, function (Faker\Generator $faker) {
  return [
        'telefono' => $faker->phoneNumber,
        //'id_usuario'=>random_int(DB::table('users')->min('id'),DB::table('users')->max('id')),
    ];
});

$factory->define(App\Models\Usuarios\Empleado::class, function (Faker\Generator $faker) {

    return [

        'estado' => 'activo',
        'cargo' => $faker->jobtitle,
        'area'=> $faker->word,
        'id_empresa'=> '1',
        'id_contrato' =>function () {
          return factory(App\Models\Usuarios\Contrato::class)->create()->id_contrato;
        },
        'id_usuario'=>  function () {
          return factory(App\Models\Usuarios\User::class)->create(['tipo_rol' => 'empleado'])->id;
        },
        'numberphone' => function(array $cliente){return factory(App\Models\Usuarios\Telefono::class)->create(['id_usuario'=>$cliente['id_usuario']])->Id_Telefono;}
    ];
});

$factory->define(App\Models\Usuarios\Contrato::class, function (Faker\Generator $faker) {
    return [
      'tipo' => $faker->word,
      'salario'=> $faker->randomNumber(6),//->numberBetween(6,10),
      'fecha_inicial'=> $faker->date,
      'fecha_fin'=> $faker->date,
    ];
});

//Empresaaa
//Contrato

/*
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
*/