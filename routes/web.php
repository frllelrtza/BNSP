<?php

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