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
        if (Auth::user()->rol === 0) {
            return response()->json(
                Objetivo::all()
            );    
        } else {
            return response()->json(
                Objetivo::where('marketing_id', Auth::user()->marketing_id)->with(['marketing'])->get()
            );
        }
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
        if ($request->nombre) {
            $objetivo->nombre = $request->nombre;
        }
        if ($request->cumplido !== null) {
            $objetivo->cumplido = $request->cumplido;
        }
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

    public function estrategias($objetivo){
        $objetivo = Objetivo::with('estrategias')->findOrFail($objetivo);
        return response()->json($objetivo->estrategias);
    }
}
