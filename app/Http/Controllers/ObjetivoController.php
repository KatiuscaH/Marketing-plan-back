<?php

namespace App\Http\Controllers;

use App\Objetivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(
            Objetivo::where('marketing_id', Auth::user()->marketing_id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return response()->json(Objetivo::create([
                'nombre' => $request->nombre,
                'marketing_id' => Auth::user()->marketing_id
            ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function show(Objetivo $objetivo)
    {
        //
        return response()->json($objetivo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objetivo $objetivo)
    {
        //
        $objetivo->nombre = $request->nombre;
        $objetivo->save();
        return response()->json($objetivo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($objetivo)
    {
        //
        return response()->json([
            "msg" => Objetivo::destroy($objetivo)
        ]);
    }
}
