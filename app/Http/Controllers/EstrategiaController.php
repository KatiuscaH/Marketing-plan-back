<?php

namespace App\Http\Controllers;

use App\Estrategia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstrategiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->marketing_id;
        $estrategias = Estrategia::whereHas('objetivos.marketing', function($query) use($id){
            $query->where('marketings.id', $id);
        })->get();

        return response()->json($estrategias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return response()->json(
            Estrategia::create(
                $request->only(['tactica', 'responsable', 'fecha', 'presupuesto', 'objetivo_id', 'indicador_logro'])
            )
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estrategia  $estrategia
     * @return \Illuminate\Http\Response
     */
    public function show(Estrategia $estrategia)
    {
        //
        return response()->json($estrategia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estrategia  $estrategia
     * @return \Illuminate\Http\Response
     */
    public function edit(Estrategia $estrategia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estrategia  $estrategia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estrategia $estrategia)
    {
        //
        $estrategia->update(
            $request->only(['tactica', 'responsable', 'fecha', 'presupuesto', 'objetivo_id', 'indicador_logro'])
        );
        return response()->json($estrategia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estrategia  $estrategia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estrategia $estrategia)
    {
        //
        return response()->json([
            "msg" => $estrategia->delete()
        ]);
    }
}
