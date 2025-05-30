<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\UploadsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rotas de Usuários
Route::group(['prefix' => 'users'], function(){
    Route::post('/create', [UserController::class, 'create']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::get('/index', [UserController::class, 'index']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
});

//Rotas de Animais
Route::group(['prefix' => 'animals'], function(){
    Route::post('/create', [AnimalController::class, 'create']);
    Route::get('/show/{id}', [AnimalController::class, 'show']);
    Route::get('/index', [AnimalController::class, 'index']);
    Route::post('/update/{id}', [AnimalController::class, 'update']);
    Route::delete('/delete/{id}', [AnimalController::class, 'delete']);
});

//Rota de Adoções
Route::group(['prefix' => 'adoptions'], function(){
    Route::post('/create', [AdoptionController::class, 'create']);
    Route::get('/show/{id}', [AdoptionController::class, 'show']);
    Route::get('/index', [AdoptionController::class, 'index']);
    Route::post('/update/{id}', [AdoptionController::class, 'update']);
    Route::delete('/delete/{id}', [AdoptionController::class, 'delete']);
});

Route::post('/upload', [UploadsController::class, 'upload']);
