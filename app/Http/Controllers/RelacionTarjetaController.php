<?php

namespace App\Http\Controllers;

use App\RelacionTarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RelacionTarjetaValidation;

class RelacionTarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relaciontarjetas= DB::table('relacion_tarjetas')
        ->join('tarjetas','tarjetas.id','=','relacion_tarjetas.id_tarjeta')
        ->join('vehiculos','vehiculos.id','=','relacion_tarjetas.id_vehiculo')
        ->select('relacion_tarjetas.id','relacion_tarjetas.monto','tarjetas.benefactor','relacion_tarjetas.tipo_gasolina','vehiculos.nombre_vehiculo',
        'relacion_tarjetas.fecha_carga','relacion_tarjetas.litros')->get();
        return view('relaciontarjetas/relaciontarjetasindex', compact('relaciontarjetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tarjetas=DB::table('tarjetas')->get();
        $vehiculos=DB::table('vehiculos')->get();
        return view('relaciontarjetas/nuevarelaciontarjeta',compact('tarjetas','vehiculos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RelacionTarjetaValidation $request)
    {
        //
        relaciontarjeta::create($request->all());
        return redirect('/relaciontarjeta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelacionTarjeta  $relacionTarjeta
     * @return \Illuminate\Http\Response
     */
    public function show(RelacionTarjeta $relacionTarjeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelacionTarjeta  $relacionTarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit(RelacionTarjeta $relaciontarjeta)
    {
        //
        return view('relaciontarjetas/editrelaciontarjeta',compact('relaciontarjeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RelacionTarjeta  $relacionTarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelacionTarjeta $relaciontarjetum)
    {
        //
        $relaciontarjetum->update($request->all());
        return redirect('/relaciontarjeta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelacionTarjeta  $relacionTarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelacionTarjeta $relaciontarjetum)
    {
        //
        DB::table('relaciontarjetas')->where('id', '=',$relaciontarjetum->id)->delete();
        return redirect()->route('relaciontarjeta.index')->with('info','registro eliminado');
    }
}
