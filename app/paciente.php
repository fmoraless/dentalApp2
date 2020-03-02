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
            return $query->where('name', 'LIKE', "%$nombres%");
    }
}
