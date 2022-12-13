<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    //create relationship with equipos
    public function equipos()
    {
        return $this->hasMany('App\Models\Equipo');
    }

    //this has many partidos
    public function partidos()
    {
        return $this->hasMany('App\Models\Partido');
    }

}
