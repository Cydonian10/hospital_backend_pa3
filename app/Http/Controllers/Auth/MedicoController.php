<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicoResource;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();

        return response()->json([
            "message" => "Todos los medicos",
            "data" => MedicoResource::collection($medicos)
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users|unique:medicos',
            'password' => 'required',
            'especialidad_id' => 'required'
        ]);

        $medico = Medico::create([
            'password' => Hash::make($request->password),
        ] + $request->all());

        return response()->json([
            "message" => "Registro de medico exitoso",
            "data" => $medico
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $medico = Medico::where("email", "=", $request->email)->first();

        if (isset($medico->id)) {
            if (Hash::check($request->password, $medico->password)) {
                $token = $medico->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "message" => "Médico logueado correctamente",
                    "token" => $token
                ]);
            } else {
                return response()->json([
                    "message" => "Las password es incorrecto",
                ], 404);
            }
        } else {
            return response()->json([
                "message" => "Médico no registrado",
            ], 404);
        }
    }

    public function medicoProfile()
    {
        return response()->json([
            "message" => "Perfil de usuario",
            "data" => auth()->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::find($id);

        $medico->fill($request->all());
        $medico->save();

        return response()->json([
            'message' => 'Actulizacion exitosa',
            'data' => $medico
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
