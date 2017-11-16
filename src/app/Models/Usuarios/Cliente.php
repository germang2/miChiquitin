<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['id_usuario', 'genero', 'ciudad', 
    ];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User');
    }
}
