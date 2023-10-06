<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Contracts\Session\Session;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// route::get('siswa', [SiswaController::class, 'index']);
// route::get('siswa/{id}', [SiswaController::class, 'detail'])->where('id', '[0-9]+');

Route::resource('siswa', SiswaController::class)->middleware('IsLogin');

Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang', [HalamanController::class, 'tentang']);
Route::get('/kontak', [HalamanController::class, 'kontak']);

Route::get('sesi', [SessionController::class, 'index'])->middleware('IsTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('IsTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('IsTamu');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('IsTamu');
