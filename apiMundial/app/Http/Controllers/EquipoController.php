<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{

    //make this controller use the auth middleware


    public function subirFoto(Request $request, $id){
        $objPersona = Equipo::find($id);
        if ($objPersona == null) {
            return response()->json(['error' => 'No se encuentra la persona'], Response::HTTP_NOT_FOUND);
        }
        $validated = Validator::make($request->all(), [
            "foto" => "required|image",
        ]);
        if ( ! $validated) {
            return response()->json($validated->messages(), Response::HTTP_BAD_REQUEST);
        }
        $file     = $request->file("foto");
        $name     = "$id.".'jpg';
        $file->move(public_path("img/icons"), $name);
        $objPersona->imagen = $name;
        $objPersona->save();

        return $objPersona;
    }
    public function returnPhoto($id)
    {
        return response()->download(storage_path("app/public/img/icons/$id.jpg"));
    }
    public function postPhoto(){

        return "hola";

    }
    public function devolverTabla($id)
    {

        //show all the partidos of the equipo

        //$equipos = Equipo::where('id', $id)->with('partidos')->get();

        $equipos = DB::select('call sp_tabla_equipos_f(?)', array($id));
        return $equipos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipos = Equipo::with('grupo')->get();
        return $equipos;
    }

    public function rand()
    {
        //
        $equipo = Equipo::inRandomOrder()->get()->first();
        return $equipo;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if ($request->id != 0) {
            //
            $equipo = Equipo::where('id', $request->id)->first();
        } else {
            $equipo = new Equipo();
        }
        $equipo->nombre = $request->nombre;
        $equipo->icono = $request->icono;
        $equipo->grupo_id = $request->grupo_id;
        $equipo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $equipo = Equipo::find($id);
        return $equipo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $equipo = Equipo::where('id', $id)->first();
        $equipo->nombre = $request->nombre;
        $equipo->icono = $request->icono;
        $equipo->grupo_id = $request->grupo_id;
        $equipo->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $equipo = Equipo::find($id);
        $equipo->delete();
    }
}
