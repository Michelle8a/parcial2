<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArticuloController;

Route::get('/', function () {
    $integrantes = [
        ['nombre' => 'Tatiana Esmeralda', 'apellido' => 'Mejía Martínez', 'carnet' => '112322'],
        ['nombre' => 'Daniela Fernanda',  'apellido' => 'Morales Corea',   'carnet' => '113623'],
        ['nombre' => 'Karina Michelle',   'apellido' => 'Leiva Ochoa',     'carnet' => '087523'],
        ['nombre' => 'Carlos José',       'apellido' => 'Alfaro Jiménez',  'carnet' => '084023'],
    ];
    $grupo = 'DWUSL-TP IDSN421';

    return view('home', compact('integrantes', 'grupo'));
})->name('home');

// CRUD Pedido
Route::get('/pedido', [PedidoController::class, 'show'])->name('pedido.show');
Route::get('/pedido/crear', [PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/{pedido}/editar', [PedidoController::class, 'edit'])->name('pedido.edit');
Route::put('/pedido/{pedido}', [PedidoController::class, 'update'])->name('pedido.update');
Route::delete('/pedido/{pedido}', [PedidoController::class, 'destroy'])->name('pedido.destroy');

// CRUD Detalles dentro de Pedido
Route::get('/pedido/{pedido}/detalles', [DetallePedidoController::class, 'index'])->name('detalle.index');
Route::post('/pedido/{pedido}/detalles', [DetallePedidoController::class, 'store'])->name('detalle.store');
Route::get('/pedido/{pedido}/detalles/{articulo}/editar', [DetallePedidoController::class, 'edit'])->name('detalle.edit');
Route::put('/pedido/{pedido}/detalles/{articulo}', [DetallePedidoController::class, 'update'])->name('detalle.update');
Route::delete('/pedido/{pedido}/detalles/{articulo}', [DetallePedidoController::class, 'destroy'])->name('detalle.destroy');

// CRUD Cliente
Route::get('/cliente', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/cliente/crear', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/{cliente}/editar', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

// CRUD Articulo
Route::get('/articulo', [ArticuloController::class, 'show'])->name('articulo.show');
Route::get('/articulo/crear', [ArticuloController::class, 'create'])->name('articulo.create');
Route::post('/articulo', [ArticuloController::class, 'store'])->name('articulo.store');
Route::get('/articulo/{articulo}/editar', [ArticuloController::class, 'edit'])->name('articulo.edit');
Route::put('/articulo/{articulo}', [ArticuloController::class, 'update'])->name('articulo.update');
Route::delete('/articulo/{articulo}', [ArticuloController::class, 'destroy'])->name('articulo.destroy');
