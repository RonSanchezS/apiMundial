<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{

    public function sinEmpezar()
    {
        $partidos = Partido::where('estado', 0)->get();
        return $partidos;
    }
    public function finalizados()
    {
        $partidos = Partido::where('estado', -1)->get();
        return $partidos;
    }
    public function enCurso()
    {
        $q = Partido::with(['eventos' => function ($q) {
            $q->inRandomOrder();
        }])->where('estado',1)->get();
        return $q;
    }
    public function partidosDelEquipoContar($id)
    {
        //
        $partidos = Partido::with('equipo1')->with('equipo2')->where('equipo1_id', $id)->orWhere('equipo2_id', $id)->get();
        return $partidos->count();
    }
    public function partidosDelEquipo($id)
    {
        //
        $partidos = Partido::with('equipo1')->with('equipo2')->where('equipo1_id', $id)->orWhere('equipo2_id', $id)->get();
        return $partidos;
    }

    public function rand()
    {
        //select partidos with estado 0
        $q = Partido::with(['eventos' => function ($q) {
            $q->inRandomOrder();
        }])->inRandomOrder()->where('estado',1)->first();

        //call all with equipo1 and equipo2 in a random order
     //   $partido = Partido::with(['equipo1', 'equipo2'])->where('id', $q->id)->inRandomOrder()->first();
        return $q;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $partidos = Partido::all();
        return $partidos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $partido = new Partido();
        $partido->equipo1_id = $request->equipo1_id;
        $partido->equipo2_id = $request->equipo2_id;
        $partido->grupo_id = $request->grupo_id;
        $partido->fecha = $request->fecha;
        $partido->horaInicio = $request->horaInicio;
        $partido->horaFin = $request->horaFin;
        $partido->estado = $request->estado;
        $partido->golesEquipo1 = $request->golesEquipo1;
        $partido->golesEquipo2 = $request->golesEquipo2;
        $partido->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $partido = Partido::with('eventos')->find($id);
        //check if the partido exists
        if ($partido == null) {
            return response()->json(['message' => 'Partido not found'], 404);
        }
        return $partido;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $partido = Partido::find($id);
        $partido->equipo1_id = $request->equipo1_id;
        $partido->equipo2_id = $request->equipo2_id;
        $partido->grupo_id = $request->grupo_id;
        $partido->fecha = $request->fecha;
        $partido->horaInicio = $request->horaInicio;
        $partido->horaFin = $request->horaFin;
        $partido->estado = $request->estado;
        $partido->golesEquipo1 = $request->golesEquipo1;
        $partido->golesEquipo2 = $request->golesEquipo2;
        $partido->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $partidos = Partido::find($id);
        $partidos->delete();
    }
}
