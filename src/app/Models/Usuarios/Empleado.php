<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = ['id_usuario', 'id_empresa', 'id_contrato', 'estado', 'cargo', 'area'
    ];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User', 'id_usuario');
    }

    public function empresa(){
    	return $this->belongsTo('App\Models\Usuarios\Empresa');
    }

    public function contrato(){
    	return $this->belongsTo('App\Models\Usuarios\Contrato', 'id_contrato', 'id_contrato');
    }
}
