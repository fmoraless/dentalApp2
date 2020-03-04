<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['rut', 'nombres', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento'];

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeSearch($query, $q)
    {
        if ($q)
            return $query->where('rut', 'LIKE', "%$q%")
                         ->orWhere('nombres', 'LIKE', "%$q%")
                         ->orWhere('apellido_paterno', 'LIKE', "%$q%")
                         ->orWhere('apellido_materno', 'LIKE', "%$q%");
    }
}
