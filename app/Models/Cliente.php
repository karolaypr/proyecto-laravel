<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function contratos(){
        return $this->hasMany('App\Models\Contrato');
    }
    public function hrutas(){
        return $this->hasMany('App\Models\Hruta');
    }
    public function pagos(){
        return $this->hasMany('App\Models\Pago');
    }
    public function fichas(){
        return $this->hasMany('App\Models\Ficha');
    }
    public function presupuestos(){
        return $this->hasMany('App\Models\Presupuesto');
    }
    public function proyectos(){
        return $this->hasMany('App\Models\Proyecto');
    }
    public function fotos(){
        return $this->hasMany('App\Models\Foto');
    }
    public function pbienes(){
        return $this->hasMany('App\Models\Pbiene');
    }
    public function psadplanos(){
        return $this->hasMany('App\Models\Psadplano');
    }
    public function wgsplanos(){
        return $this->hasMany('App\Models\Wgsplano');
    }
    public function documentos(){
        return $this->hasMany('App\Models\Documento');
    }
    public function vplanos(){
        return $this->hasMany('App\Models\Vplano');
    }
}

