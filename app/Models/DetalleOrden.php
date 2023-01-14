<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;
    protected $table='detalleorden';
    protected $primaryKey='iddetalle';
    public $timestamps=false;
    protected $fillable=['idorden','producto','unidad','cantidad'];
}
