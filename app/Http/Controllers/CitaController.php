<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();

        return response()->json([
            "message" => "Todas las citas",
            "data" => $citas
        ]);
    }

    public function citasByUser()
    {
        $citas = Cita::where('user_id', '=', auth()->user()->id)->get();

        return response()->json([
            'message' => 'Citas por usuarrio',
            'data' => $citas
        ]);
    }




    public function citasByMedico()
    {

        $citas = Cita::where('medico_id', '=', auth()->user()->id)->get();

        return response()->json([
            'message' => 'Citas por medico',
            'data' => $citas
        ]);
    }

    public function show($id)
    {
        $cita = Cita::find($id);

        return response()->json([
            "message" => "Una cita",
            "data" => $cita
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'medico_id' => 'required'
        ]);

        $cita = Cita::create([
            'user_id' => auth()->user()->id,
        ] + $request->all());

        return response()->json([
            "message" => "Cita creado exitosamente",
            "data" => $cita
        ]);
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::find($id);

        $cita->fill($request->all());
        $cita->save();

        return response()->json([
            'message' => 'Actulizacion exitosa',
            'data' => $cita
        ]);
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);

        $cita->delete();

        return response()->json([
            'message' => 'Eliminado correctamente',
        ]);
    }
}
