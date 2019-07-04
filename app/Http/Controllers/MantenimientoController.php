<?php

namespace App\Http\Controllers;

use App\mantenimiento;
use Illuminate\Http\Request;
use App\Http\Requests\MantenimientoValidation;
use Illuminate\Support\Facades\DB;
use App\vehiculo;
use Illuminate\Support\Facades\Date;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mantenimientos = mantenimiento::get();
        /* $mantenimientos=DB::table('mantenimientos')
        ->join('vehiculos','vehiculos.id','=','mantenimientos.id_vehiculo')
        ->select('mantenimientos.*','vehiculos.nombre_vehiculo')->get(); */
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
        $fecha = Date::createFromFormat('d/m/Y', $request->fecha);
        $fecha_prox = Date::createFromFormat('d/m/Y', $request->fecha_prox);

        if($fecha->gt($fecha_prox)) {
            return redirect()->route('mantenimiento.create')->with('error','La fecha del mantenimiento próximo no debe ser menor a la fecha del mantenimiento actual');
        }

        $vehiculoAUsar = vehiculo::find($request->id_vehiculo);


        mantenimiento::create([

            'vehiculo' => $vehiculoAUsar->nombre_vehiculo,
            'id_vehiculo' => $vehiculoAUsar->id,
            'descripcion' => $request->descripcion,
            'kilometraje' => $request->kilometraje,
            'fecha' => $fecha,
            'fecha_prox' => $fecha_prox,
            'agencia'=> $request->agencia,
            'observaciones' => $request->observaciones,
            'costo' => $request->costo,
            'tipo' => $request->tipo
        ]);

        //$vehiculoAUsar->disponible = $request->tipo;
        //$vehiculoAUsar->save();
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
        $vehiculos= vehiculo::get();
        return view('mantenimientos/editarmantenimiento',compact(['mantenimiento','vehiculos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(MantenimientoValidation $request, mantenimiento $mantenimiento)
    {

        $vehiculoAUsar = vehiculo::find($request->id_vehiculo);
        $fecha = Date::createFromFormat('d/m/Y', $request->fecha);
        $fecha_prox = Date::createFromFormat('d/m/Y', $request->fecha_prox);
        $mantenimiento->update([
            'vehiculo' => $vehiculoAUsar->nombre_vehiculo,
            'descripcion' => $request->descripcion,
            'kilometraje' => $request->kilometraje,
            'fecha' => $fecha,
            'fecha_prox' => $fecha_prox,
            'agencia'=> $request->agencia,
            'observaciones' => $request->observaciones,
            'costo' => $request->costo,
            'tipo' => $request->tipo
        ]);
        return redirect('/mantenimiento');
        //
    }

    public function aprobar(mantenimiento $mantenimiento)
    {
        $vehiculoAUsar = vehiculo::find($mantenimiento->id_vehiculo);
        $vehiculoAUsar->disponible = $mantenimiento->tipo;
        $vehiculoAUsar->save();

        $mantenimiento->estado = 1;
        $mantenimiento->save();
        return redirect()->route('mantenimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(mantenimiento $mantenimiento)
    {
        DB::table('mantenimientos')->where('id', '=',$mantenimiento->id)->delete();
        return redirect()->route('mantenimiento.index')->with('info','registro eliminado');
    }
}
