<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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
Route::prefix('cliente')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::post('/', [ClienteController::class, 'crear'])->name('cliente.crear');
    Route::get('/ganador', [ClienteController::class, 'ganador'])->name('cliente.ganador');
    Route::get('/municipios/{departamento_id}', [ClienteController::class, 'municipios']);
    Route::get('/departamentos', [ClienteController::class, 'departamentos']);
    Route::get('/exportar', [ClienteController::class, 'exportar'])->name('clientes.exportar');
});

