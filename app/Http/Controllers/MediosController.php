<?php

namespace App\Http\Controllers;

use App\Medios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MediosController extends Controller
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
            Medios::where('marketing_id', Auth::user()->marketing_id)->get()
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
        $medio = Medios::create([
            'publicidad'=>$request->tipopublicidad,
            'caracteristicas'=>$request->caracteristicas, 
            'ubicacion'=>$request->ubicacion, 
            'realizacion'=>$request->realizacion, 
            'duracion'=>$request->duracion, 
            'numero'=>$request->numero, 
            'costo'=>$request->costo, 
            'marketing_id'=> Auth::user()->marketing_id
        ]);

        return response()->json($medio, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medios  $medios
     * @return \Illuminate\Http\Response
     */
    public function show(Medios $medios)
    {
        //
        return response()->json($medios);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medios  $medios
     * @return \Illuminate\Http\Response
     */
    public function update(Medios $medios, Request $request)
    {
        //
        // $medios->publicidad = $request->publicidad;
        // $medios->caracteristicas = $request->caracteristicas;
        // $medios->ubicacion = $request->ubicacion;
        // $medios->realizacion = $request->realizacion;
        // $medios->duracion = $request->duracion;
        // $medios->numero = $request->numero;
        // $medios->costo = $request->costo;
        // $medios->marketing_id = Auth::user()->marketing_id;
        // $medios->save();

        return response()->json($medios);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medios  $medios
     * @return \Illuminate\Http\Response
     */
    public function destroy($medios)
    {
        //
        return response()->json([
            "msg" => Medios::destroy($medios)
        ]);
    }
}
