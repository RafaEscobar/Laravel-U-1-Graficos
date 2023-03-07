<?php

use App\Http\Controllers\AttendanceController;
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

// UHVUV
Route::get('/ver', [AttendanceController::class, 'ver'])->name('ver');
Route::get('/inasistencias', [AttendanceController::class, 'inasistencias'])->name('inasistencias');
Route::get('/entradas-salidas', [AttendanceController::class, 'entradas_salidas'])->name('entradas-salidas');
Route::get('/temperatura-voltaje', [AttendanceController::class, 'temperatura_voltaje'])->name('temperatura-voltaje');
Route::get('/carga-temp', [AttendanceController::class, 'carga_temp'])->name('carga-temp');
