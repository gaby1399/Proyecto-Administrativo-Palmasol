<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;


    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }

    public function presupuestos()
    {
        return $this->hasMany('App\Models\Presupuesto');
    }

    public function calMaterials()
    {
        return $this->hasMany('App\Models\CalMaterial');
    }

    public function calGastos()
    {
        return $this->hasMany('App\Models\CalGasto');
    }
}
