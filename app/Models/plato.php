<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\categoria;
class plato extends Model
{
    use HasFactory;
    protected $table='plato';
    protected $primaryKey='idplato';
    public $timestamps=false;
    protected $fillable=['nombreplato','descripcion','imagen','precio','estado','idcategoria'];

    public function categoria(){
        return $this->hasOne(categoria::class,'idcategoria','idcategoria');
    }
    public function pedido(){
        return $this->hasMany(Detalle::class,'idplato','idplato');
    }
}
