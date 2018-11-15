<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                    "token" => "Aqui va el token una vez haga eso"
                ]);
            }
            return response()->json([
                "error" => "Contraseña no coincide"
            ], 403);
        }
        return response()->json([
            "error" => "User not found" //Si el usuario con ese email no existe.
        ], 404);
    }
}
