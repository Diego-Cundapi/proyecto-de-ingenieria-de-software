<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
use \App\Http\Controller\CategoriaController;
use App\Http\Livewire\ShowPage;


Route::get('/', \App\Http\Livewire\ShowPage::class)->name('index');

Route::resource('/dashboard/categoria', \App\Http\Controllers\CategoriaController::class)->middleware(['auth', 'verified','can:dashboard'])->names('categoria');

//ruta para entrar al dashboard
Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->middleware(['auth', 'verified','can:dashboard'])->name('dashboard');

//rutas del crud del dashboard
Route::resource('/dashboard/productos', ProductosController::class)->middleware(['auth', 'verified','can:dashboard'])->except('show')->name('*','productos');

//rutas del crud de los pedidos
Route::resource('/dashboard/ventas', PedidoController::class)->middleware(['auth', 'verified','can:dashboard'])->names('ventas');

//rutas del carrito

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/carrito', [\App\Http\Controllers\CarritoController::class,'index'])->name('carrito.index');
    Route::post('/agregarproducto', [\App\Http\Controllers\CarritoController::class,'agregarProducto'])->name('carrito.agregarproducto');
    Route::get('/incrementar/{id}', [\App\Http\Controllers\CarritoController::class,'incrementarProducto'])->name('carrito.incrementarproducto');
    Route::get('/decrementar/{id}', [\App\Http\Controllers\CarritoController::class,'decrementarProducto'])->name('carrito.decrementarproducto');
    Route::get('/eliminaritem/{id}', [\App\Http\Controllers\CarritoController::class,'eliminarItem'])->name('carrito.eliminaritem');
    Route::get('/eliminarcarrito', [\App\Http\Controllers\CarritoController::class,'eliminarCarrito'])->name('carrito.eliminarcarrito');
    Route::get('/confirmarrcarrito', [\App\Http\Controllers\CarritoController::class,'confirmarCarrito'])->name('carrito.confirmarcarrito');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
