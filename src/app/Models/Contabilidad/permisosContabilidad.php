<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class permisosContabilidad extends Model
{
    //
    protected $table = 'permisos';

    protected $fillable = ['id_usuario', 'estado'];

}
