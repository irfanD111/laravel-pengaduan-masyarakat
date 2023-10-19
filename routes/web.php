<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;







//data masyarakat
Route ::get('/data-masyarakat', [MasyarakatController::class, 'data_masyarakat']);
Route ::get('/data-petugas', [PetugasController::class, 'data_petugas']);

//register dan login
Route::get('/daftar', [AuthController::class, 'register']);
Route::post('/daftar', [AuthController::class, 'daftar_masyarakat']);
Route::get('/tambah-petugas', [AuthController::class, 'tambah']);
Route::post('/tambah-petugas', [AuthController::class, 'daftar_petugas']);
Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'proses_login']);
Route::get('/logout',[AuthController::class,'logout']);


//  Route::middleware(['auth'])->group(function () {
    Route ::get('/home', [PengaduanController::class, 'index']);
    Route::get('/isi_pengaduan',[PengaduanController::class, 'proses_isi_pengaduan']);
    Route::post('/isi_pengaduan', [PengaduanController::class, 'proses_tambah_pengaduan']);
//  }); 

Route ::get('/hapus_pengaduan/{id}', [ PengaduanController::class,'hapus']);
Route ::get('/detail_pengaduan/{id}', [PengaduanController::class, 'detail']);
Route ::get('/Update/{id}', [PengaduanController::class, 'update']);
Route ::post('/update/{id}', [PengaduanController::class, 'proses_update']);






Route::get('/', function () {
    return view('welcome');
});






