<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    //create relationship with grupo
    public function grupo(){
        return $this->belongsTo('App\Models\Grupo');
    }
    //create relationship with partidos
    public function partidos(){
        return $this->hasMany('App\Models\Partido');
    }



}
