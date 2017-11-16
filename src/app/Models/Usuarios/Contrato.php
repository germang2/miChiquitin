<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'tipo', 'salario', 'fecha_inicial', 'fecha_fin',
    ];

    public function empleado(){
    	return $this->hasOne('App\Models\Usuarios\Empleado');
    }
}
