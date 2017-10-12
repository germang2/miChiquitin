<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefono';

    protected $fillable = ['Id_UsuarioOEmpresa', 'telefono'];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User');
    }
}
