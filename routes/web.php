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

Route::get('/',['App\Http\Controllers\UserController','index']);

Route::get('/search/user', ['App\Http\Controllers\UserController','searchUser'])->name('searchUser');

Route::get('/get/mandal', ['App\Http\Controllers\UserController','getMandal'])->name('getMandal');

Route::get('/get/village', ['App\Http\Controllers\UserController','getVillage'])->name('getVillage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email', [App\Http\Controllers\UserController::class, 'email'])->name('email');
