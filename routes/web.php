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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [App\Http\Controllers\Contas\UserController::class, 'index'])->name('user.index');

    // Route::get('users', [App\Http\Controllers\Contas\UserController::class, 'teste'])->name('user.teste');
    Route::get('users/data', [App\Http\Controllers\Contas\UserController::class, 'getData'])->name('user.data');
});



Auth::routes();
