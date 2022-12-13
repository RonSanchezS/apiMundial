<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class Eventocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        //
        $eventos = Evento::all();
        return $eventos;
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
        $evento = new Evento();
        $evento->partido_id = $request->partido_id;
        $evento->minuto = $request->minuto;
        $evento->lado = $request->lado;
        $evento->descripcion = $request->descripcion;
        $evento->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $evento = Evento::find($id);
        return $evento;
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
        $evento = Evento::find($id);
        $evento->partido_id = $request->partido_id;
        $evento->minuto = $request->minuto;
        $evento->lado = $request->lado;
        $evento->descripcion = $request->descripcion;
        $evento->save();
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
        $evento = Evento::find($id);
        $evento->delete();
    }
}
