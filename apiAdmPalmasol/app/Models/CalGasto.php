<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalGasto extends Model
{
    use HasFactory;

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

    public function presupuesto()
    {
        return $this->belongsTo('App\Models\Presupuesto');
    }
}
