<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\tareasController;

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

Route::get('/app', function () {
    return view('welcome');
});


Route::get('/', [tareasController::class, 'obtenerTarea'])->name('listas');

Route::patch('/{id}', [tareasController::class, 'update'])->name('update');

Route::post('/', [tareasController::class, 'store'])->name('listas');

Route::get('/completadas', [tareasController::class, 'obtenerCompletadas'])->name('completadas');

Route::patch('/completadas/{id}', [tareasController::class, 'restore'])->name('restore');

Route::get('/completadas/{id}', [tareasController::class, 'delete'])->name('delete');



