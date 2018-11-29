<?php

namespace App\Http\Controllers;

use App\Marketing;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\MarketingResource;
class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return response()->json(auth()->user()->marketing()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userData = $request->only('plan', 'estudiantes', 'empresario_id');
        $validatedData = Validator::make($userData, [
            'plan' => 'required|string',
            'estudiantes' => 'required|string',
            'empresario_id' => 'required|numeric',
        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 409);
        }
        $marketing = new Marketing;
        $marketing->plan = $request->plan;
        $marketing->estudiantes = $request->estudiantes;
        $marketing->save();

        $empresario = User::find($request->empresario_id);
        $empresario->marketing_id = $marketing->id;
        $empresario->save();
        $user = auth()->user();
        $user->marketing_id = $marketing->id;
        $user->save();

        return response()->json($marketing);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show($marketing)
    {
        //
        $marketing = Marketing::findOrFail($marketing);
        $marketing->load('users');
        return new MarketingResource($marketing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marketing $marketing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketing $marketing)
    {
        //
        return response()->json([
            'msg' => $marketing->delete(),
        ]);
    }

    public function presentacion(Marketing $marketing, Request $request)
    {
        $marketing->presentacion = $request->presentacion;
        $marketing->save();
    }
    public function historia(Marketing $marketing, Request $request)
    {
        $marketing->historia = $request->historia;
        $marketing->save();
    }
    public function pest(Marketing $marketing, Request $request)
    {
        $marketing->pest = $request->pest;
        $marketing->save();
    }
    public function porter(Marketing $marketing, Request $request)
    {
        $marketing->porter = $request->porter;
        $marketing->save();
    }
    public function coatrop(Marketing $marketing, Request $request)
    {
        $marketing->coatrop = $request->coatrop;
        $marketing->save();
    }
    public function clientes(Marketing $marketing, Request $request)
    {
        $marketing->clientes = $request->clientes;
        $marketing->save();
    }
    public function competencia(Marketing $marketing, Request $request)
    {
        $marketing->competencia = $request->competencia;
        $marketing->save();
    }
    public function proveedores(Marketing $marketing, Request $request)
    {
        $marketing->proveedores = $request->proveedores;
        $marketing->save();
    }
    public function bcg(Marketing $marketing, Request $request)
    {
        $marketing->bcg = $request->bcg;
        $marketing->save();
    }
    public function dofa(Marketing $marketing, Request $request)
    {
        $marketing->dofa = $request->dofa;
        $marketing->save();
    }
    public function mefi(Marketing $marketing, Request $request)
    {
        $marketing->mefi = $request->mefi;
        $marketing->save();
    }
    public function ansoff(Marketing $marketing, Request $request)
    {
        $marketing->ansoff = $request->ansoff;
        $marketing->save();
    }
}
