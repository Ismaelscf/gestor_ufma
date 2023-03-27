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
    Route::get('users/data', [App\Http\Controllers\Contas\UserController::class, 'getData'])->name('user.data');

    Route::get('/reports', [App\Http\Controllers\Reports\ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports', [App\Http\Controllers\Reports\ReportController::class, 'reports'])->name('reports.report');

    Route::get('/report/{course?}/{report?}/{quiz?}', [App\Http\Controllers\Reports\ReportController::class, 'report'])->name('report.index');

    Route::get('aprovadosForpres', [App\Http\Controllers\Reports\ReportController::class, 'aprovadosForpres'])->name('aprovadosForpres');
    Route::get('reprovadosForpres', [App\Http\Controllers\Reports\ReportController::class, 'reprovadosForpres'])->name('reprovadosForpres');
    Route::get('nAcessaramQ1Forpres', [App\Http\Controllers\Reports\ReportController::class, 'nAcessaramQ1Forpres'])->name('nAcessaramQ1Forpres');
});



Auth::routes();
