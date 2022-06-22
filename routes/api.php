<?php

use App\Http\Controllers\API\MahasiswaController;
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
Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/mahasiswa', 'index');
    Route::get('/mahasiswa/detail/{id}', 'show');
    Route::post('/mahasiswa/add', 'store');
    Route::post('/mahasiswa/update/{id}', 'update');
    Route::delete('/mahasiswa/delete/{id}', 'destroy');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
