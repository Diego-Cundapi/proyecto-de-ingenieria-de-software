<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Livewire\ShowPage;
use App\Http\Livewire\Inventario;
use App\Http\Livewire\InventarioModal;

Route::get('/', \App\Http\Livewire\ShowPage::class)->name('index');

Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->middleware(['auth', 'verified','can:dashboard'])->name('dashboard');

Route::resource('/dashboard/productos', ProductosController::class)->except('show')->name('*','productos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
