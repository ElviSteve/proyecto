<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $table='detalles';
    protected $primaryKey='iddetalle';
    public $timestamps=false;
    protected $fillable=['idpedido','idplato','precio','cantidad','especificacion','subtotal'];

    public function plato(){
        return $this->hasOne(plato::class,'idplato','idplato');
    }
}
