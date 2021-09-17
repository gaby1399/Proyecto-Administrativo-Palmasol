<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
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
