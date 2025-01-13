<?php

use App\Http\Controllers\AsistenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PesertaPraktikumController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\PraktikumController;
use App\Http\Controllers\PraktikumDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/dashboard',
    [MahasiswaController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

// Ruang Views ================================>
Route::get(
    '/ruang',
    [RuangController::class, 'index']
)->middleware(['auth', 'verified'])->name('ruang');

Route::get(
    '/ruang/edit/{ruang}',
    [RuangController::class, 'edit']
)->middleware(['auth', 'verified'])->name('ruang.edit');

Route::get('/ruang/create', function () {
    return view('ruang.create');
})->middleware(['auth', 'verified'])->name('ruang.create');

Route::post(
    '/ruang/store',
    [RuangController::class, 'store']
)->middleware(['auth', 'verified'])->name('ruang.store');

Route::delete(
    '/ruang/{id}',
    [RuangController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('ruang.destroy');

// Mata Kuliah =================================================
Route::get(
    '/mk',
    [MataKuliahController::class, 'index']
)->middleware(['auth', 'verified'])->name('mk');

Route::get(
    '/mk/edit/{mk}',
    [MataKuliahController::class, 'edit']
)->middleware(['auth', 'verified'])->name('mk.edit');

Route::get('/mk/create', function () {
    return view('mk.create');
})->middleware(['auth', 'verified'])->name('mk.create');

Route::post(
    '/mk/store',
    [MataKuliahController::class, 'store']
)->middleware(['auth', 'verified'])->name('mk.store');

Route::delete(
    '/mk/{id}',
    [MataKuliahController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('mk.destroy');

// Praktikum =================================================
Route::get(
    '/praktikum',
    [PraktikumController::class, 'index']
)->middleware(['auth', 'verified'])->name('praktikum');

Route::get(
    '/praktikum/detail/{praktikum}',
    [PraktikumController::class, 'show']
)->middleware(['auth', 'verified'])->name('praktikum.show');

Route::get(
    '/praktikum/detail/{praktikum}/{section}',
    [PraktikumController::class, 'show']
)->middleware(['auth', 'verified'])->name('praktikum.show');

Route::get(
    '/praktikum/edit/{praktikum}',
    [PraktikumController::class, 'edit']
)->middleware(['auth', 'verified'])->name('praktikum.edit');

Route::get(
    '/praktikum/create',
    [PraktikumController::class, 'create']
)->middleware(['auth', 'verified'])->name('praktikum.create');

Route::post(
    '/praktikum/store',
    [PraktikumController::class, 'store']
)->middleware(['auth', 'verified'])->name('praktikum.store');

Route::delete(
    '/praktikum/{id}',
    [PraktikumController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('praktikum.destroy');

//  =====> Peserta Praktikum
Route::get(
    '/praktikum/peserta/create',
    [PesertaPraktikumController::class, 'create']
)->middleware(['auth', 'verified'])->name('praktikum.peserta.create');

Route::delete(
    '/praktikum/peserta/{id}',
    [PesertaPraktikumController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('praktikum.peserta.destroy');

// ======> Detail Nilai
Route::post(
    '/praktikum/nilai/store',
    [PraktikumDetailController::class, 'store_nilai']
)->middleware(['auth', 'verified'])->name('praktikum.nilai.store');

Route::put(
    '/praktikum/nilai/update/{id}',
    [PraktikumDetailController::class, 'update_nilai']
)->middleware(['auth', 'verified'])->name('praktikum.nilai.update');

Route::get(
    '/praktikum/nilai/create/{id}',
    [PraktikumDetailController::class, 'create_nilai']
)->middleware(['auth', 'verified'])->name('praktikum.nilai.create');

Route::get(
    '/praktikum/nilai/edit/{id}',
    [PraktikumDetailController::class, 'edit_nilai']
)->middleware(['auth', 'verified'])->name('praktikum.nilai.edit');

Route::get(
    '/praktikum/nilai/download/{id}',
    [PraktikumDetailController::class, 'download_nilai']
)->middleware(middleware: ['auth', 'verified'])->name('praktikum.nilai.download');

Route::delete(
    '/praktikum/nilai/{id}',
    [PraktikumDetailController::class, 'destroy_nilai']
)->middleware(['auth', 'verified'])->name('praktikum.nilai.destroy');


// Mahasiswa =================================================
Route::get(
    '/mahasiswa',
    [MahasiswaController::class, 'index']
)->middleware(['auth', 'verified'])->name('mahasiswa');

Route::get(
    '/mahasiswa/upload/{id_post}/{NRP}',
    [MahasiswaController::class, 'upload_nilai']
)->middleware(['auth', 'verified'])->name('mahasiswa.upload');

Route::get(
    '/mahasiswa/detail_kelas',
    [MahasiswaController::class, 'detail_kelas']
)->middleware(['auth', 'verified'])->name('mahasiswa.detail_kelas');

Route::get(
    '/mahasiswa/edit/{mahasiswa}',
    [MahasiswaController::class, 'edit']
)->middleware(['auth', 'verified'])->name('mahasiswa.edit');

Route::get(
    '/mahasiswa/create',
    [MahasiswaController::class, 'create']
)->middleware(['auth', 'verified'])->name('mahasiswa.create');

Route::post(
    '/mahasiswa/store',
    [MahasiswaController::class, 'store']
)->middleware(middleware: ['auth', 'verified'])->name('mahasiswa.store');

Route::delete(
    '/mahasiswa/{id}',
    [MahasiswaController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('mahasiswa.destroy');

Route::get(
    '/mahasiswadashboard',
    [MahasiswaController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('mahasiswa.dashboard');


// Jadwal =================================================
Route::get(
    '/jadwal',
    [JadwalController::class, 'index']
)->middleware(['auth', 'verified'])->name('jadwal');

Route::get(
    '/jadwal/edit/{jadwal}',
    [JadwalController::class, 'edit']
)->middleware(['auth', 'verified'])->name('jadwal.edit');

Route::get(
    '/jadwal/create',
    [JadwalController::class, 'create']
)->middleware(['auth', 'verified'])->name('jadwal.create');

Route::post(
    '/jadwal/store',
    [JadwalController::class, 'store']
)->middleware(middleware: ['auth', 'verified'])->name('jadwal.store');

Route::delete(
    '/jadwal/{id}',
    [JadwalController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('jadwal.destroy');

// Nilai =================================================
Route::get(
    '/nilai',
    [NilaiController::class, 'index']
)->middleware(['auth', 'verified'])->name('nilai');

Route::get(
    '/nilai/edit/{nilai}',
    [NilaiController::class, 'edit']
)->middleware(['auth', 'verified'])->name('nilai.edit');

Route::get(
    '/nilai/create',
    [NilaiController::class, 'create']
)->middleware(['auth', 'verified'])->name('nilai.create');

Route::post(
    '/nilai/store',
    [NilaiController::class, 'store']
)->middleware(middleware: ['auth', 'verified'])->name('nilai.store');

Route::delete(
    '/nilai/{id}',
    [NilaiController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('nilai.destroy');

// Postingan
Route::get(
    '/postingan/create/{id_praktikum}',
    [PostinganController::class, 'create']
)->middleware(middleware: ['auth', 'verified'])->name('postingan.create');

Route::get(
    '/postingan/edit/{id}',
    [PostinganController::class, 'edit']
)->middleware(['auth', 'verified'])->name('postingan.edit');

Route::post(
    '/postingan/store',
    [PostinganController::class, 'store']
)->middleware(middleware: ['auth', 'verified'])->name('postingan.store');

Route::delete(
    '/nilai/{id}',
    [PostinganController::class, 'destroy']
)->middleware(['auth', 'verified'])->name('postingan.destroy');

Route::get(
    '/postingan/download/{id}',
    [PostinganController::class, 'download']
)->middleware(middleware: ['auth', 'verified'])->name('postingan.download');

// Mahasiswa =================================================
Route::get(
    '/asisten',
    [AsistenController::class, 'index']
)->middleware(['auth', 'verified'])->name('asisten');

Route::get(
    '/nilai/create',
    [AsistenController::class, 'create']
)->middleware(['auth', 'verified'])->name('asisten.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
