<?php

namespace App\Http\Controllers;

use App\abono;
use Illuminate\Http\Request;
use App\Http\Requests\AbonoValidation;
use Illuminate\Support\Facades\DB;

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
       ->select('abonos.id','abonos.folio','abonos.monto','abonos.fecha','tarjetas.benefactor')->get();

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
        //
        $saldo = DB::table('tarjetas')->
        where('id', '=', $request->id_tarjeta)->latest()->value('saldo');

            abono::create($request->all());
            DB::table('tarjetas')->where('id', '=', $request->id_tarjeta)
            ->increment('saldo', $request->monto);
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
