<?php

namespace App\Models\Cartera;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Deuda extends Model
{
  protected $primaryKey = 'id_deuda';

	protected $table = "deudas";

	protected $fillable = ['id_usuario', 'id_plan', 'id_factura', 'valor_pagado', 'valor_a_pagar', 'plazo_credito', 'estado'];

	public function pagos()
	{
		return $this->hasmany('App\Models\Cartera\Pago');
	}

	public function plan_de_pago()
	{
		return $this->belongsTo('App\Models\Cartera\PlanDePago','id_plan');
	}

	public function paz_y_salvo()
	{
		return $this->hasOne('App\Models\Cartera\Paz_y_salvo');
	}

	public function user(){
			return $this->belongsTo('App\Models\Usuarios\User','id_usuario');
	}

	public function factura(){
			return $this->belongsTo('App\Models\Facturacion\Factura','id_factura');
  }
  
  public function scopeSearch($q){
    //dd(request()->search);
    return empty(request()->search) ? $q : $q->where('id_usuario', request()->search);
  }

}
