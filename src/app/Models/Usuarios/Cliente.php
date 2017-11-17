<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_usuario', 'genero', 'ciudad',
    ];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User');
    }
}
