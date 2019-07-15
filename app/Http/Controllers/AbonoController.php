<?php

namespace App\Http\Controllers;

use App\abono;
use Illuminate\Http\Request;
use App\Http\Requests\AbonoValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $abonos=DB::table('abonos')
       ->join ('tarjetas','tarjetas.id','=','abonos.id_tarjeta')
       ->select('abonos.id',
                'abonos.folio',
                'abonos.monto',
                'abonos.fecha',
                'tarjetas.benefactor',
                'abonos.estado'
        )->get();

       ;
        return view('abonos/indexabonos', compact('abonos'));
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
        return view('abonos/nuevoabono', compact('tarjetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbonoValidation $request)
    {

        $fecha = Date::createFromFormat('d/m/Y', $request->fecha);
        $fechaactual= Date::today();
        if ($fecha <= $fechaactual) {
            abono::create([
                'folio'=> $request->folio,
                'monto'=> $request->monto,
                'fecha'=> $fecha,
                'id_tarjeta'=> $request->id_tarjeta,
                'estado' => 0
            ]);
            return redirect('/abono');

        }else {
            return redirect()->route('abono.create')->with('error','La fecha no puede ser mayor a la fecha del dia actual');

        }


    }

    public function aprobar(abono $abono)
    {
        DB::table('tarjetas')->where('id', '=', $abono->id_tarjeta)
        ->increment('saldo', $abono->monto);

        $abono->estado = 1;
        $abono->save();
        return redirect('/abono');
    }

    public function cancelar(abono $abono)
    {
        $abono->estado = 2;
        $abono->save();
        return redirect('/abono');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function show(abono $abono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function edit(abono $abono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, abono $abono)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function destroy(abono $abono)
    {
        //
        $abono->delete();
        return redirect()->route('abono.index')->with('info', 'registro eliminado');
    }
}
