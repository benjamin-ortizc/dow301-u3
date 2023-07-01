<?php

use App\Http\Controllers\PerfilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\CuentasController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Route::get('/admin', [HomeController::class, 'admin'])->name('home.admin');
Route::post('/filtrar', [HomeController::class, 'filtrar'])->name('home.filtrar');

Route::post('/login', [CuentasController::class, 'login'])->name('cuenta.login');
Route::post('/register', [CuentasController::class, 'store'])->name('cuenta.store');
Route::get('/logout', [CuentasController::class, 'logout'])->name('cuenta.logout');
Route::get('/cuentas', [CuentasController::class, 'index'])->name('cuenta.index');
Route::get('/cuenta/{user}', [CuentasController::class, 'show'])->name('cuenta.show');
Route::get('/cuenta/{user}/edit', [CuentasController::class, 'edit'])->name('cuenta.edit');
Route::put('/cuenta/{user}/edit', [CuentasController::class, 'update'])->name('cuenta.update');
Route::delete('/cuenta/{user}', [CuentasController::class, 'destroy'])->name('cuenta.destroy');

Route::get('/perfiles', [PerfilesController::class, 'index'])->name('perfiles.index');

Route::get('/imagen/upload', [ImagenController::class, 'upload'])->name('imagen.upload');
Route::post('/imagen/store', [ImagenController::class, 'store'])->name('imagen.store');
Route::delete('/imagen/{imagen}', [ImagenController::class, 'destroy'])->name('imagen.destroy');
Route::get('/imagen/{imagen}/edit', [ImagenController::class, 'edit'])->name('imagen.edit');
Route::put('/imagen/{imagen}', [ImagenController::class, 'update'])->name('imagen.update');
Route::get('/imagen/{imagen}/ban', [ImagenController::class, 'ban'])->name('imagen.ban');
Route::put('/imagen/ban/{imagen}', [ImagenController::class, 'banImagen'])->name('imagen.banImagen');
Route::put('/imagen/unban/{imagen}', [ImagenController::class, 'unbanImagen'])->name('imagen.unbanImagen');
