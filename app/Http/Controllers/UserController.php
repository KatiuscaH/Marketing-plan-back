<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
     public function index()
    {
        //
        return response()->json(User::all());
    }

     public function store(Request $request)
    {
        //
        $userData = $request->only(['nombre', 'apellido', 'password','email']);
        $validatedData = Validator::make($userData, [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            
        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 409);
        }
        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol = 0;
        $user->save();
        return response()->json($user);
    }

    public function show(User $docente)
    {
        //
        return response()->json($docente);
    }

     public function update(Request $request, User $estudiante)
    {
        //
        $userData = $request->only(['nombre', 'apellido', 'password','email']);
        $validatedData = Validator::make($userData, [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
                    ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 409);
        }
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->save();
        return response()->json($user);
    }

     public function destroy(User $docente)
    {
        //
        return response()->json([
            "msg" => $docente->delete()
        ]);
    }
}
