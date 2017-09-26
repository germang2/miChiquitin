<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    protected $fillable = ['nombre', 'direccion'
    ];

    public function empleados(){
    	return $this->hasMany('App\Models\Usuarios\Empleado');
    }
}
