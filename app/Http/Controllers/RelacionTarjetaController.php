<?php

namespace App\Http\Controllers;

use App\RelacionTarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RelacionTarjetaValidation;
use App\tarjeta;
use App\vehiculo;
use Illuminate\Support\Facades\Date;

class RelacionTarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historial = DB::table('relacion_tarjeta_historial');
        $relaciontarjetas = RelacionTarjeta::union($historial)->get();

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

                /* $relaciontarjetum->aprobado = 1;
                $relaciontarjetum->save(); */

                tarjeta::where('id', $relaciontarjetum->id_tarjeta)->
                    decrement('saldo', $relaciontarjetum->monto);

                $relaciontarjetum->delete();
                $usuario = user::find($relaciontarjetum->id_usuario);
                $vehiculo = vehiculo::find($relaciontarjetum->id_vehiculo);
                $tarjeta = tarjeta::find($relaciontarjetum->id_tarjeta);

                DB::table('relacion_tarjeta_historial')->insert([
                    'monto' => $relaciontarjetum->monto,
                    'id_tarjeta' => $tarjeta->benefactor,
                    'tipo_gasolina' => $relaciontarjetum->tipo_gasolina,
                    'id_vehiculo' => $vehiculo->nombre_vehiculo,
                    'fecha_carga' => $relaciontarjetum->fecha_carga,
                    'litros' => $relaciontarjetum->litros,
                    'id_usuario'=> $relaciontarjetum->id_usuario,
                    'aprobado' => 1
                ]);

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

        $relaciontarjetum->delete();

        $usuario= usuario::find($relaciontarjetum->id_usuario);
        $vehiculo = vehiculo::find($relaciontarjetum->id_vehiculo);
        $tarjeta = tarjeta::find($relaciontarjetum->id_tarjeta);

        DB::table('relacion_tarjeta_historial')->insert([

            'monto' => $relaciontarjetum->monto,
            'id_tarjeta' => $tarjeta->benefactor,
            'tipo_gasolina' => $relaciontarjetum->tipo_gasolina,
            'id_vehiculo' => $vehiculo->nombre_vehiculo,
            'fecha_carga' => $relaciontarjetum->fecha_carga,
            'litros' => $relaciontarjetum->litros,
            'id_usuario'=> $relaciontarjetum->id_usuario,
            'aprobado' => 2
        ]);

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

        $fecha = Date::createFromFormat('d/m/Y', $request->fecha_carga);
        $fechaactual= Date::today();
        $username= auth()->user()->name;
        $disponible=DB::table('vehiculos')->where('id','=',$request->id_vehiculo)->latest()->value('disponible');
        $tipogasolina= DB::table('vehiculos')->where('id', '=', $request->id_vehiculo)
        ->latest()->value('tipo_gasolina');
        $saldo = DB::table('tarjetas')->
        where('id', '=', $request->id_tarjeta)->latest()->value('saldo');
        $max = DB::table('vehiculos')->
        where('id', '=', $request->id_vehiculo)->latest()->value('capacidad_tanque_gasolina');
        if ($saldo>=$request->monto) {

            if ($request->litros <= $max) {
                if ($request->tipo_gasolina == $tipogasolina) {
                    if ($disponible == 1) {
                        if ($fecha->gt($fechaactual)) {
                            return redirect()->route('relaciontarjeta.create')->with('error','La fecha no puede ser mayor al dia actual');
                        }

                        relaciontarjeta::create($request->all());
                        return redirect('/relaciontarjeta');
                    }else {
                        return redirect()->route('relaciontarjeta.create')->with('error','El vehiculo no esta disponible');
                    }

                }else{
                    return redirect()->route('relaciontarjeta.create')->with('error','El tipo de gasolina no coincide ');
                }

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
