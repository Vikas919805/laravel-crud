<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


 

 Route::get('product',[ProductController::class,'index'])->name('product.index');
   
 Route::get('create',[ProductController::class,'create'])->name('product.create');

 Route::post('product',[ProductController::class,'store'])->name('product.store');

 Route::get('product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');

 Route::put('product/{id}/',[ProductController::class,'update'])->name('product.update');

// Route::delete('product/{id}/',[ProductController::class,'destroy'])->name('product.destroy');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
