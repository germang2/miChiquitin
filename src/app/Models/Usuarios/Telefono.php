<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefono';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['id_usuario', 'telefono'];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User');
    }
}
