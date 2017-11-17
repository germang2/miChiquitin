<?php
use Illuminate\Database\Seeder;
class Planpago extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan_de_pagos')->insert([
        	'id_plan_de_pago' => '1',
        	'nombre_plan' => 'Efectivo',
        	'cuotas' => '0',
        	'valor_cuota' => '0',
        	'interes' => '0',
        	'forma_pago' => 'Efectivo'
        ]);
        DB::table('plan_de_pagos')->insert([
        	'id_plan_de_pago' => '2',
        	'nombre_plan' => '1 Mes',
        	'cuotas' => '1',
        	'valor_cuota' => '0',
        	'interes' => '0',
        	'forma_pago' => 'Efectivo'
        ]);
        DB::table('plan_de_pagos')->insert([
        	'id_plan_de_pago' => '3',
        	'nombre_plan' => '3 Meses',
        	'cuotas' => '3',
        	'valor_cuota' => '0',
        	'interes' => '0',
        	'forma_pago' => 'Efectivo'
        ]);
        DB::table('plan_de_pagos')->insert([
        	'id_plan_de_pago' => '4',
        	'nombre_plan' => '6 Meses',
        	'cuotas' => '6',
        	'valor_cuota' => '0',
        	'interes' => '0',
        	'forma_pago' => 'Efectivo'
        ]);
    }
}