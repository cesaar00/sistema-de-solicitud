<?php

namespace App\Http\Controllers;

use App\vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoValidation;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos=vehiculo::paginate(5);
        return view('vehiculos/indexvehiculo', compact('vehiculos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos/nuevovehiculo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculoValidation $request)
    {
        vehiculo::create($request->all());
        return redirect('/vehiculo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(vehiculo $vehiculo)
    {
        //dd($vehiculo->all());
        return view('vehiculos/editvehiculo',compact('vehiculo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculoValidation $request, vehiculo $vehiculo)
    {
        $vehiculo->update($request->all());
        return redirect('/vehiculo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $vehiculo)
    {
    DB::table('vehiculos')->where('id', '=',$vehiculo->id)->delete();
        return redirect()->route('vehiculo.index')->with('info','registro eliminado');
    }
}
