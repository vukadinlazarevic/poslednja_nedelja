<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/product-add', [ProductController::class, 'add'])->name('product-add');
    Route::post('/product-create', [ProductController::class, 'create'])->name('product-create');
});

Route::middleware('checkAdmin')->group(function() {
    Route::get('/svi-proizvodi', [ProductController::class, 'list'])->name("product-list");
});

require __DIR__.'/auth.php';
