<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [];

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeNombre($query, $nombres)
    {
        if ($nombres)
            return $query->where('nombres', 'LIKE', "%$nombres%");
    }
    public function scopeApellidoPaterno($query, $apellido_pat)
    {
        if ($apellido_pat)
            return $query->where('apellido_paterno', 'LIKE', "%$apellido_pat%");
    }
    public function scopeApellidoMaterno($query, $apellido_mat)
    {
        if ($apellido_mat)
            return $query->where('apellido_materno', 'LIKE', "%$apellido_mat%");
    }
}
