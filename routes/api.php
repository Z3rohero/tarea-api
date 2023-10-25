<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TareaController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




//Rutas para el login
Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);

//rutas protegidas
Route::group(['middleware' => ['JwtVerified']], function(){
    Route::apiResource('tarea', TareaController::class);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
    Route::get('usuarios', [AuthController::class, 'allUsers']);
    Route::post('logout', [AuthController::class, 'logout']);
});






