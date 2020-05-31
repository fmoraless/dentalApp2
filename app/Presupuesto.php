<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    public function prestaciones()
    {
        return $this->belongsToMany(Prestacion::class)->withPivot(['cantidad']);
    }
}
