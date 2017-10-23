<?php

namespace App\Models\Cartera;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
	protected $table = "deudas";

	protected $fillable = ['id_usuario', 'id_plan', 'id_factura', 'valor_pagado', 'valor_a_pagar', 'plazo_credito', 'estado'];

	public function pagos()
	{
		return $this->hasmany('App\Models\Cartera\Pago');
	}

	public function plan_de_pago()
	{
		return $this->belongsTo('App\Models\Cartera\PlanDePago');
	}

	public function paz_y_salvo()
	{
		return $this->hasOne('App\Models\Cartera\Paz_y_salvo');
	}

	public function user(){
			return $this->belongsTo('App\Models\Usuarios\User');
	}

	public function factura(){
			return $this->belongsTo('App\Models\Facturacion\Factura');
	}
}
