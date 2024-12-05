<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\SiswaController;
use App\http\Controllers\BukuController;
use App\http\Controllers\peminjamanController;


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

Route::post('/createsiswa', [SiswaController::class, 'createsiswa']);
Route::get('/siswa', [SiswaController::class, 'index']);
Route::put('/siswa/{id}', [SiswaController::class, 'updatesiswa']);
Route::get('/siswa/{id}', 'App\Http\Controllers\SiswaController@getSiswaById');
Route::delete('/siswa/{id}', 'App\Http\Controllers\SiswaController@deleteSiswa');

Route::post('/buku', [BukuController::class, 'createbuku']);
Route::put('/buku/{id_buku}', [BukuController::class, 'updatebuku']);
Route::delete('/buku/{id_buku}', [BukuController::class, 'deleteBuku']);
Route::get('/buku', [BukuController::class, 'getAllBuku']);
Route::get('/buku/{id_buku}', [BukuController::class, 'getBukuById']);

Route::post('/peminjaman', [peminjamanController::class, 'P1']);



Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
