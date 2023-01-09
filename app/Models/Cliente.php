<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table='clientes';
    protected $primaryKey='dni';
    public $timestamps=false;
    protected $fillable=['nombres','telefono','tipo','direccion'];

    public function pedido(){
        return $this->hasMany(Pedido::class,'dni','dni');
    }
}
