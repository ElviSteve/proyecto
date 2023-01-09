<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\plato;

class categoria extends Model
{
    use HasFactory;
    protected $table='categorias';
    protected $primaryKey='idcategoria';
    public $timestamps=false;
    protected $fillable=['categoria'];

    public function plato(){
        return $this->hasMany(plato::class,'idplato','idplato');
    }

}
