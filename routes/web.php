<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KelassController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JamPelajaranController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RombonganBelajarController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JadwalPelajaranController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/peserta-didik', [PdController::class, 'index']);
Route::get('/peserta-didik/detil/{id}', [PdController::class, 'show']);
Route::get('/peserta-didik/import-view', [PdController::class, 'create']);

Route::get('/ruang-kelas', [RuangKelasController::class, 'index']);
Route::get('/ruang-kelas/import-view', [RuangKelasController::class, 'create']);

Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/import-view', [KelasController::class, 'create']);

Route::get('/mata-pelajaran', [MapelController::class, 'index']);
Route::post('/mata-pelajaran/store', [MapelController::class, 'store']);
Route::delete('/mata-pelajaran/delete/{id}', [MapelController::class, 'destroy']);
// Route::get('/mata-pelajaran/detil', [MapelController::class, 'show']);
// Route::get('/mata-pelajaran/import-view', [MapelController::class, 'create']);

Route::get('/jam-pelajaran', [JamPelajaranController::class, 'index']);
Route::get('/jam-pelajaran/import-view', [JamPelajaranController::class, 'create']);

Route::get('/gtk', [GuruController::class, 'index']);
Route::get('/gtk/read', [GuruController::class, 'read']);
Route::get('/gtk/import-view', [GuruController::class, 'create']);

Route::get('/rombongan-belajar', [RombonganBelajarController::class, 'index']);
Route::post('/rombongan-belajar', [RombonganBelajarController::class, 'store']);
Route::delete('/rombongan-belajar/{id}', [RombonganBelajarController::class, 'destroy']);
Route::get('/anggota-rombel/{id}', [RombonganBelajarController::class, 'show']);
Route::put('/rombongan-belajar/testing/{id}', [RombonganBelajarController::class, 'testing']);

Route::get('/tahun-ajaran', [TahunAjaranController::class, 'index']);
Route::get('/tahun-ajaran/import-view', [TahunAjaranController::class, 'create']);

Route::get('/absensi', [AbsensiController::class, 'index']);
Route::get('/absensi/download', [AbsensiController::class, 'create']);
Route::get('/absensi/dataabsensi', [AbsensiController::class, 'dataabsensi']);
Route::get('/absensi/datariwayatabsensi', [AbsensiController::class, 'datariwayatabsensi']);
Route::get('/absensi/datatigahari', [AbsensiController::class, 'datatigahari']);

Route::get('/jadwal-pelajaran', [JadwalPelajaranController::class, 'index']);
Route::post('/jadwal-pelajaran', [JadwalPelajaranController::class, 'store']);
Route::delete('/jadwal-pelajaran/{id}', [JadwalPelajaranController::class, 'destroy']);

// Route::get('/', [KelasController::class, 'index']);
Route::get('/read', [KelassController::class, 'read']);
Route::post('/store', [KelassController::class, 'store']);
Route::post('/show', [KelassController::class, 'show']);
Route::post('/update', [KelassController::class, 'update']);
Route::delete('/destroy/{id}', [KelassController::class, 'destroy']);


