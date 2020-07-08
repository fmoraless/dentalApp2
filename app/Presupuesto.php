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
        'presup_observacion',
        'presup_expiracion',
        'presup_descuento',
        'presup_creador',
        'user_id',
        'abono_id',
        'paciente_id',
        'status',
        'total',
    ];

    public function prestaciones()
    {
        return $this->belongsToMany(Prestacion::class)
            ->withPivot(['cantidad']);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
