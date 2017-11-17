<?php

namespace App\Models\Cartera;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $primaryKey = 'id_pago';

  protected $table = "pagos";

  protected $fillable = ['id_deuda', 'valor'];

  public function deuda()
  {
    return $this->belongsTo('App\Models\Cartera\Deuda','id_deuda');
  }
}
