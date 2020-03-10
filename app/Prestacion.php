<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    public function scopeSearch($query, $q)
    {
        if ($q)
            return $query->where('presta_nombre', 'LIKE', "%$q%")
                ->orWhere('presta_descripcion', 'LIKE', "%$q%");
    }
}
