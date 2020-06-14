<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'presup_descripcion',
        'presup_expiracion',
        'presup_creador',
    ];

    public function prestaciones()
    {
        return $this->belongsToMany(Prestacion::class)
            ->using(PrestacionPresupuesto::class)
            ->withPivot(['presta_valor', 'cantidad']);
    }
}
