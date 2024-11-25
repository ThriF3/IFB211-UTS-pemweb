<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PesertaPraktikumController;
use App\Http\Controllers\PraktikumController;
use App\Http\Controllers\RuangController;
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

Route::apiResource('ruang', RuangController::class);
Route::apiResource('mk', MataKuliahController::class);
Route::apiResource('mhsw', MahasiswaController::class);
Route::apiResource('praktikum', PraktikumController::class);
Route::apiResource('jadwal', JadwalController::class);
Route::apiResource('peserta', PesertaPraktikumController::class);
Route::apiResource('nilai', NilaiController::class);