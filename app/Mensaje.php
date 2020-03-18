<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable = ['titulo_mensaje', 'cuerpo_mensaje', 'fecha_mensaje', 'creador_mensaje','paciente_id'];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
