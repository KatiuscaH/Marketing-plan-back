<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(User::where('rol', 1));
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
        $userData = $request->only(['nombre', 'apellido', 'password','email','periodo', 'year']);
        $validatedData = Validator::make($userData, [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'periodo' => 'required|numeric',
            'year' => 'required|numeric',
        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 409);
        }
        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->periodo = $request->periodo;
        $user->year = $request->year;
        $user->rol = 1;
        $user->save();
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $estudiante)
    {
        //
        return response()->json($estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $estudiante)
    {
        //
        $userData = $request->only(['nombre', 'apellido', 'password','email','periodo', 'year']);
        $validatedData = Validator::make($userData, [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'periodo' => 'required|numeric',
            'year' => 'required|numeric',
        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 409);
        }
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->periodo = $request->periodo;
        $estudiante->year = $request->year;
        $estudiante->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $estudiante)
    {
        //
        return response()->json([
            "msg" => $estudiante->delete()
        ]);
    }
}
