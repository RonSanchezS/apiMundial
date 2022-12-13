<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    //this has one equipo in equipo1
    public function equipo1(){
        return $this->belongsTo('App\Models\Equipo');
    }
    //this has one equipo in equipo2
    public function equipo2(){
        return $this->belongsTo('App\Models\Equipo');
    }


    //create relationship with eventos
    public function eventos(){
        return $this->hasMany('App\Models\Evento');
    }

    //get partido state for display, if state is 1, display "En juego", if state is 0, display "Por jugar"
    public function estado(){
        switch ($this->estado){
            case 0:
                return "Por jugar";
                break;
            case 1:
                return "En juego";
                break;
            case -1:
                return "Finalizado";
                break;
        }
    }
}
