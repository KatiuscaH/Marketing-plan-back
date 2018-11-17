<?php

namespace App\Http\Controllers;

use App\Marketing;
use App\User;
use Illuminate\Http\Request;
use Validator;

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
        // return response()->json(auth()->marketing);
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
        return response()->json($empresario);
        $empresario->marketing()->associate($marketing);
        auth()->marketing()->associate($marketing);

        return response()->json($marketing);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show(Marketing $marketing)
    {
        //
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
    }
}
