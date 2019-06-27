<?php

namespace App\Http\Controllers;

use App\tarjeta;
use Illuminate\Http\Request;
use App\Http\Requests\TarjetaValidation;
use Illuminate\Support\Facades\DB;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tarjetas=tarjeta::paginate(5);
        return view('tarjetas/index', compact('tarjetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tarjetas/nuevatarjeta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarjetaValidation $request)
    {
        //
        tarjeta::create($request->all());
        return redirect('/tarjeta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function show(tarjeta $tarjeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit(tarjeta $tarjeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(TarjetaValidation $request, tarjeta $tarjetum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $tarjetum)
    {
        //
        $datos = DB::table('relacion_tarjetas')->where('id_tarjeta', $tarjetum->id)->get();
        if(sizeof($datos) > 0) {
            return redirect()->route('tarjeta.index')->with('infono','No se puede eliminar por que existe un activo pendiente');
        }
        else {
            DB::table('tarjetas')->where('id', '=',$tarjetum->id)->delete();
            return redirect()->route('tarjeta.index')->with('info','registro eliminado');
        }
    }
}
