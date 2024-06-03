<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('login', [AuthController::class,'index'])->name('login');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
});


Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/pendapatan', function () {
    return view('dashboard.pendapatan.index');
});

Route::get('/pengeluaran', function () {
    return view('dashboard.pengeluaran.index');
});

Route::get('/produk', function () {
    return view('dashboard.produk.index');
});