<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    //Relación uno a muchos inversa
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }
}
