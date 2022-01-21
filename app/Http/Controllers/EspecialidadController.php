<?php

namespace App\Http\Controllers;

use App\Http\Resources\EspecialidadCollection;
use App\Http\Resources\EspecialidadResource;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{

    public function index()
    {
        $especialidades = Especialidad::all();

        return  new EspecialidadCollection($especialidades);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|unique:especialidads,name',
        ]);

        $especialidad = Especialidad::create($request->all());
        $especialidad->save();

        return response()->json([
            'message' => 'Creado con exito',
            'data' => new EspecialidadResource($especialidad)
        ]);
    }

    public function show($id)
    {

        $especialidad = Especialidad::find($id);

        if (!$especialidad) {
            return response()->json([
                'message' => 'No se encontro la especialidad con el id' . ' ' . "#$id",
            ]);
        }

        return response()->json([
            'message' => 'Una sola especialidad',
            'data' => new EspecialidadResource($especialidad)
        ]);
    }

    public function update(Request $request, $id)
    {
        $especialidad = Especialidad::where("id", "=", $id)->first();

        if (!$especialidad) {
            return response()->json([
                'message' => 'No se encontro la especialidad con el id' . ' ' . "#$id",
            ]);
        }
        $especialidad->fill($request->all());
        $especialidad->save();

        return response()->json([
            'message' => 'Actulizacion exitosa',
            'data' => new EspecialidadResource($especialidad)
        ]);
    }


    public function destroy($id)
    {
        $especialidad = Especialidad::where("id", "=", $id)->first();

        if (!$especialidad) {
            return response()->json([
                'message' => 'No se encontro la especialidad con el id' . ' ' . "#$id",
            ]);
        }

        $especialidad->delete();

        return response()->json([
            'message' => 'Eliminado correctamente',
        ]);
    }
}
