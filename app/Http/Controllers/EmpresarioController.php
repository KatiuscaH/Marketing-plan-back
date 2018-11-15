<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
class EmpresarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(User::where('rol', 2));
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
        $userData = $request->only(['nombre', 'apellido', 'password', 'email', 'periodo', 'year']);
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
        $user->rol = 2;
        $user->save();
        return response()->json($user);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $empresario)
    {
        //
        return response()->json($empresario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $empresario)
    {
        //
        $userData = $request->only(['nombre', 'apellido', 'password', 'email', 'periodo', 'year']);
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
        $empresario->nombre = $request->nombre;
        $empresario->apellido = $request->apellido;
        $empresario->periodo = $request->periodo;
        $empresario->year = $request->year;
        $empresario->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $empresario)
    {
        //
        return response()->json([
            "msg" => $empresario->delete()
        ]);
    }
}
