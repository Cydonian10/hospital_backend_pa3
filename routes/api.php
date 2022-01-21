<?php

use App\Http\Controllers\Auth\MedicoController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\EspecialidadController;
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

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout/user', [UserController::class, 'logout']);

    Route::get('medico-profile', [MedicoController::class, 'medicoProfile']);
    Route::get('logout/medico', [MedicoController::class, 'logout']);

    //Especialidades
    Route::apiResource('especialidades', EspecialidadController::class);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });