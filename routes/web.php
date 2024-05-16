<?php

use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return view('home', ['title' => 'home']);
});

// provinsi
Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('provinsi');
Route::post('/provinsi', [ProvinsiController::class, 'store'])->name('provinsi.post');
Route::get('/provinsi/{id}/update', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
Route::put('/provinsi/{id}/update', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.delete');


// kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::post('/kecamatan', [KecamatanController::class, 'store'])->name('kecamatan.post');
Route::get('/kecamatan-edit/{id}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
Route::put('/kecamatan-edit/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
Route::delete('/kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.delete');


// kelurahan
Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahan');
Route::post('/kelurahan', [KelurahanController::class, 'store'])->name('kelurahan.post');
Route::get('/kelurahan-edit/{id}', [KelurahanController::class, 'edit'])->name('kelurahan.edit');
Route::put('/kelurahan-edit/{id}', [KelurahanController::class, 'update'])->name('kelurahan.update');
Route::delete('/kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.delete');


// pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.post');
Route::get('/pegawai-edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai-edit/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');
