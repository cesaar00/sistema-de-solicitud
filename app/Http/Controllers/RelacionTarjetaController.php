<?php

namespace App\Http\Controllers;

use App\RelacionTarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RelacionTarjetaValidation;
use App\tarjeta;
use App\vehiculo;

class RelacionTarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relaciontarjetas = RelacionTarjeta::get();
        
        /* $relaciontarjetas= DB::table('relacion_tarjetas')
        ->join('tarjetas','tarjetas.id','=','relacion_tarjetas.id_tarjeta')
        ->join('vehiculos','vehiculos.id','=','relacion_tarjetas.id_vehiculo')
        ->select('relacion_tarjetas.id','relacion_tarjetas.monto','tarjetas.benefactor','relacion_tarjetas.tipo_gasolina','vehiculos.nombre_vehiculo',
        'relacion_tarjetas.fecha_carga','relacion_tarjetas.litros')->get(); */
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

    public function aprobar(RelacionTarjeta $relaciontarjetum)
    {
        $tarjeta = tarjeta::find($relaciontarjetum->id_tarjeta);
        $vehiculo = vehiculo::find($relaciontarjetum->id_vehiculo);

        if ($tarjeta->saldo>=$relaciontarjetum->monto) {
            if ($relaciontarjetum->litros <= $vehiculo->capacidad_tanque_gasolina) {
                
                $relaciontarjetum->aprobado = 1;
                $relaciontarjetum->save();

                tarjeta::where('id', $relaciontarjetum->id_tarjeta)->
                    decrement('saldo', $relaciontarjetum->monto);

                return redirect('/relaciontarjeta');

            } else return redirect()->route('relaciontarjeta.index')->
                with('error','Los litros que quiere ingresar superan la capacidad del Tanque');
        } else return redirect()->route('relaciontarjeta.index')->
                with('error','Saldo insuficiente');

    }

    public function cancelar(RelacionTarjeta $relaciontarjetum)
    {
        $relaciontarjetum->aprobado = 2;
        $relaciontarjetum->save();
        return redirect()->route('relaciontarjeta.index');
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
        $saldo = DB::table('tarjetas')->
        where('id', '=', $request->id_tarjeta)->latest()->value('saldo');
        $max = DB::table('vehiculos')->
        where('id', '=', $request->id_vehiculo)->latest()->value('capacidad_tanque_gasolina');
        if ($saldo>=$request->monto) {

            if ($request->litros <= $max) {
                relaciontarjeta::create($request->all());
                /* DB::table('tarjetas')->where('id', '=', $request->id_tarjeta)
                ->decrement('saldo', $request->monto); */
                return redirect('/relaciontarjeta');

            } else{
                return redirect()->route('relaciontarjeta.create')->with('error','Los litros que quiere ingresar superan la capacidad del Tanque');
            }

        }
        else {
            return redirect()->route('relaciontarjeta.create')->with('error','Saldo insuficiente');
        }
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
    public function edit(RelacionTarjeta $relaciontarjetum)
    {
        //echo($relaciontarjetum);
        //dd($relaciontarjeta->all());
       $benefactor = DB::table('tarjetas')->where('id','=', $relaciontarjetum->id_tarjeta)->
       latest()->value('benefactor');
       $nvehiculo = DB::table('vehiculos')->where('id','=', $relaciontarjetum->id_vehiculo)->
       latest()->value('nombre_vehiculo');

        return view('relaciontarjetas/editrelaciontarjeta',compact(['relaciontarjetum','benefactor','nvehiculo']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RelacionTarjeta  $relacionTarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(RelacionTarjetaValidation $request, RelacionTarjeta $relaciontarjetum)
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
    public function destroy(Request $relaciontarjetum)
    {
        //
        DB::table('relacion_tarjetas')->where('id', '=',$relaciontarjetum->id)->delete();
        return redirect()->route('relaciontarjeta.index')->with('info','registro eliminado');
    }
}
