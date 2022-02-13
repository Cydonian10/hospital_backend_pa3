<?php

use App\Http\Controllers\Auth\MedicoController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\RecetaController;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register/user', [UserController::class, 'register']);
Route::post('login/user', [UserController::class, 'login']);

Route::post('register/medico', [MedicoController::class, 'register']);
Route::post('login/medico', [MedicoController::class, 'login']);

//! *** Parte publica para Especialidades ***
Route::get('especialidades', [EspecialidadController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    //! ** Usuarios **
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout/user', [UserController::class, 'logout']);
    Route::put('usuario/update/{usuario}', [UserController::class, 'update']);

    //! ** Medicos **
    Route::get('medico-profile', [MedicoController::class, 'medicoProfile']);
    Route::get('logout/medico', [MedicoController::class, 'logout']);
    Route::get('medicos', [MedicoController::class, 'index']);
    Route::put('medico/update/{medico}', [MedicoController::class, 'update']);

    //! ** Especialidades **
    Route::apiResource('especialidades', EspecialidadController::class)->except('index');

    //! ** Citas **
    Route::get('citas/medico', [CitaController::class, 'citasByMedico']);
    Route::get('citas/user', [CitaController::class, 'citasByUser']);
    Route::apiResource('citas', CitaController::class);

    //! ** Recetas **
    Route::get('recetas/user', [RecetaController::class, 'recetasByUser']);
    Route::apiResource('recetas', RecetaController::class);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
