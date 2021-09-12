<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTrabajo extends Model
{
    use HasFactory;

    public function comprobantes()
    {
        return $this->hasMany('App\Models\Comprobantes');
    }
}
