<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/lowongandetail/{id}', [App\Http\Controllers\HomeController::class, 'show']);

Route::group(['middleware' => ['cekrole:0']], function () {
    Route::get('/home', [App\Http\Controllers\UserController::class, 'beranda']);
});

Route::group(['middleware' => ['cekrole:1']], function () {
    Route::get('/home', [App\Http\Controllers\KepalaUnit::class, 'datalowongan']);
});



Route::group(['middleware' => ['cekrole:1']], function () {
    Route::get('/datalowongan', [App\Http\Controllers\KepalaUnit::class, 'datalowongan']);
});

Route::group(['middleware' => ['cekrole:1']], function () {
    Route::get('/formlowongan', [App\Http\Controllers\KepalaUnit::class, 'formlowongan']);
    Route::get('/formEditLowongan/{id}', [App\Http\Controllers\KepalaUnit::class, 'formeditLowongan']);
    Route::get('/datalowongan/delete/{id}', [App\Http\Controllers\KepalaUnit::class, 'deletelowongan']);
});

Route::group(['middleware' => ['cekrole:1']], function () {
    Route::post('/addlowongan', [App\Http\Controllers\KepalaUnit::class, 'addlowongan']);
    Route::post('/editlowongan', [App\Http\Controllers\KepalaUnit::class, 'editlowongan']);
});

Auth::routes();

