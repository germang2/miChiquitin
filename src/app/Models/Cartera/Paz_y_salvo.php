<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paz_y_salvo extends Model
{
    protected $table = "paz_y_salvos";

    protected $fillable = ['id_deuda', 'fecha', 'hora', 'concepto'];

    public function deuda()
    {
    	return $this->belongsTo('App\Models\Cartera\Deuda');
    }
}
