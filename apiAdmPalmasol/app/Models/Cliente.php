<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function presupuestos()
    {
        return $this->hasMany('App\Models\Presupuestos');
    }

    public function comprobantes()
    {
        return $this->hasMany('App\Models\Comprobantes');
    }
}
