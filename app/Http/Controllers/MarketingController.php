<?php

namespace App\Http\Controllers;

use App\Marketing;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MarketingResource;
use App\Http\Resources\MarketingAdminResource;

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
        return response()->json(Auth::user()->marketing);
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

    public function mostrarTodo(){
        return  MarketingAdminResource::collection(Marketing::all());
    }

    public function mostrarEstrategias(Marketing $marketing){
        return response()->json($marketing->estrategias);
    }

    public function presentacion(Marketing $marketing, Request $request)
    {
        $marketing->presentacion = $request->presentacion;
        $marketing->save();
        return response()->json($marketing);
    }
    public function historia(Marketing $marketing, Request $request)
    {
        $marketing->historia = $request->historia;
        $marketing->save();
        return response()->json($marketing);
    }
    public function pest(Marketing $marketing, Request $request)
    {
        $marketing->pest = $request->pest;
        $marketing->save();
        return response()->json($marketing);
    }
    public function porter(Marketing $marketing, Request $request)
    {
        $marketing->porter = $request->porter;
        $marketing->save();
        return response()->json($marketing);
    }
    public function coatrop(Marketing $marketing, Request $request)
    {
        $marketing->coatrop = $request->coatrop;
        $marketing->save();
        return response()->json($marketing);
    }
    public function clientes(Marketing $marketing, Request $request)
    {
        $marketing->clientes = $request->clientes;
        $marketing->save();
        return response()->json($marketing);
    }
    public function competencia(Marketing $marketing, Request $request)
    {
        $marketing->competencia = $request->competencia;
        $marketing->save();
        return response()->json($marketing);
    }
    public function proveedores(Marketing $marketing, Request $request)
    {
        $marketing->proveedores = $request->proveedores;
        $marketing->save();
        return response()->json($marketing);
    }
    public function bcg(Marketing $marketing, Request $request)
    {
        $marketing->bcg = $request->bcg;
        $marketing->save();
        return response()->json($marketing);
    }
    public function dofa(Marketing $marketing, Request $request)
    {
        $marketing->dofa = $request->dofa;
        $marketing->save();
        return response()->json($marketing);
    }
    public function mefi(Marketing $marketing, Request $request)
    {
        $marketing->mefi = $request->mefi;
        $marketing->save();
        return response()->json($marketing);
    }
    public function ansoff(Marketing $marketing, Request $request)
    {
        $marketing->ansoff = $request->ansoff;
        $marketing->save();
        return response()->json($marketing);
    }
}
