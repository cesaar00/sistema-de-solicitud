<?php

namespace App\Http\Controllers;

use App\vale;
use Illuminate\Http\Request;
use App\Http\Requests\ValeValidation;

class ValeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vales=vale::paginate(5);
        return view('vales/index', compact('vales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vales/crearvale');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValeValidation $request)
    {
        //dd($request->all());
        vale::create($request->all());
        return redirect('/vale');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function show(vale $vale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function edit(vale $vale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vale $vale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function destroy(vale $vale)
    {
        $vale->delete();
        return redirect()->route('vale.index')->with('info', 'registro eliminado');
    }
}
