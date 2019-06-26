<?php

namespace App\Http\Controllers;

use App\mantenimiento;
use Illuminate\Http\Request;
use App\Http\Requests\MantenimientoValidation;
use Illuminate\Support\Facades\DB;
use App\vehiculo;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mantenimientos=DB::table('mantenimientos')
        ->join('vehiculos','vehiculos.id','=','mantenimientos.id_vehiculo')
        ->select('mantenimientos.*','vehiculos.nombre_vehiculo')->get();
        return view('mantenimientos/indexmantenimiento', compact(['mantenimientos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vehiculos= DB::table('vehiculos')->get();
        return view('mantenimientos/nuevomantenimiento', compact(['vehiculos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MantenimientoValidation $request)
    {
        //dd($request->all());
        /* DB::table('vehiculos')
        ->where('id', '=', $request->id)
        ->update('disponible'-> $request->tipo)
        ; */




        /* $datos = [
            'id' => $request->id,
            'tipo' => $request->tipo
        ]; */

        mantenimiento::create($request->all());
        $vehiculoAUsar = vehiculo::find($request->id_vehiculo);
        $vehiculoAUsar->disponible = $request->tipo;
        $vehiculoAUsar->save();
        return redirect()->route('mantenimiento.index');
        //dd($vehiculoAUsar);
        /* return redirect()->route('mantenimiento.up', $datos); */

    }

    public function up($datos) {


        DB::table('vehiculos')
        ->where('id', '=', $datos->id)
        ->update(['disponible'=> $datos->tipo]);
        return redirect('/mantenimiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(mantenimiento $mantenimiento)
    {
        //
        $mantenimiento->delete();
        return redirect()->route('mantenimiento.index')->with('info','registro eliminado');
    }
}
