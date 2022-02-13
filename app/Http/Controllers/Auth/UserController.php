<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'password' => Hash::make($request->password),
        ] + $request->all());

        $user->save();

        return response()->json([
            "message" => "Registro de usuario exitoso",
            "data" => $user
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where("email", "=", $request->email)->first();

        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "message" => "Usuario logueado correctamente",
                    "token" => $token
                ]);
            } else {
                return response()->json([
                    "message" => "Las password es incorrecto",
                ], 404);
            }
        } else {
            return response()->json([
                "message" => "Usuario no registrado",
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->fill($request->all());
        $user->save();

        return response()->json([
            'message' => 'Actulizacion exitosa',
            'data' => $user
        ]);
    }


    public function userProfile()
    {
        return response()->json([
            "message" => "Perfil de usuario",
            "data" => auth()->user()
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "Cierre de sesion",
        ]);
    }
}
