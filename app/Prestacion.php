<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    protected $fillable = ['presta_nombre', 'presta_descripcion', 'presta_valor'];

    public function presupuestos()
    {
        return $this->belongsToMany(Presupuesto::class);
    }

    public function scopeSearch($query, $q)
    {
        if ($q)
            return $query->where('presta_nombre', 'LIKE', "%$q%")
                ->orWhere('presta_descripcion', 'LIKE', "%$q%");
    }
}
