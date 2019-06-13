<?php

namespace App\Http\Controllers;

use App\mantenimiento;
use Illuminate\Http\Request;
use App\Http\Requests\MantenimientoValidation;
use Illuminate\Support\Facades\DB;

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
        ->select('mantenimientos.id','vehiculos.nombre_vehiculo','mantenimientos.descripcion','mantenimientos.kilometraje',
        'mantenimientos.fecha','mantenimientos.fecha_prox','mantenimientos.observaciones',
        'mantenimientos.costo')->get();
        return view('mantenimientos/indexmantenimiento', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mantenimientos/nuevomantenimiento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MantenimientoValidation $request)
    {
        //
        mantenimiento::create($request->all());
        return redirect('mantenimiento');
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
