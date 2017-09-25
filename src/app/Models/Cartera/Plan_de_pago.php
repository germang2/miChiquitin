<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_de_pago extends Model
{
    protected $table = "plan_de_pagos";

    protected $fillable = ['nombre_plan', 'cuotas', 'valor_cuota', 'interes', 'forma_pago'];

    public function deuda()
    {
    	return $this->belongsTo('App\Models\Cartera\Deuda');
    }
}
