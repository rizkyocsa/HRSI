<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Master\TugasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::post('/login', [AuthController::class, 'login'] );

Route::middleware(['auth:sanctum', 'role:Lead'])->group(function () {

    Route::prefix('tugas')->group(function () {
        Route::post('/', [TugasController::class, 'index']);
        Route::post('/insert-update', [TugasController::class, 'create_update']);
        Route::get('/{id}', [TugasController::class, 'get']);
        Route::delete('/delete/{id}', [TugasController::class, 'delete']);
    });

});

Route::middleware(['auth:sanctum', 'role:Pegawai'])->group(function () {
    
    Route::prefix('tugas')->group(function () {
        Route::post('/create', [TugasController::class, 'create']);
        Route::post('/update', [TugasController::class, 'update']);
        Route::get('/get', [TugasController::class, 'get']);
        Route::delete('/delete', [TugasController::class, 'delete']);
    });

});
