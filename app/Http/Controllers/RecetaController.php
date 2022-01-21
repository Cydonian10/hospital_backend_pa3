<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Facade\Ignition\DumpRecorder\DumpHandler;
use Illuminate\Http\Request;

class RecetaController extends Controller
{

    public function index()
    {
        $recetas = Receta::paginate();

        return response()->json([
            'message' => 'Todos las recetas',
            'data' => $recetas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'medico_name' => 'required|min:5',
            'user_id' => 'required'
        ]);

        $receta = Receta::create($request->all());
        $receta->save();

        return response()->json([
            'message' => 'Receta creada exitosamente',
            'data' => $receta
        ]);
    }


    public function show($id)
    {
        $receta = Receta::find($id);

        if (!$receta) {
            return response()->json([
                'message' => 'No se encontro la receta con el id' . ' ' . "#$id",
            ]);
        }

        return response()->json([
            'message' => 'Una sola especialidad',
            'data' => $receta
        ]);
    }


    public function update(Request $request, $id)
    {
        $receta = Receta::find($id);

        if (!$receta) {
            return response()->json([
                'message' => 'No se encontro la receta con el id' . ' ' . "#$id",
            ]);
        }

        $receta->fill($request->all());
        $receta->save();

        return response()->json([
            'message' => 'Actulizacion exitosa',
            'data' => $receta
        ]);
    }


    public function destroy($id)
    {
        $receta = Receta::find($id);

        if (!$receta) {
            return response()->json([
                'message' => 'No se encontro la receta con el id' . ' ' . "#$id",
            ]);
        }
        $receta->delete();

        return response()->json([
            'message' => 'Eliminado correctamente',
        ]);
    }

    public function recetasByUser()
    {
        $user = auth()->user();

        return response()->json([
            'message' => "Recetas del usuario  " . auth()->user()->name,
            'data' => $user->recetas

        ]);
    }
}
