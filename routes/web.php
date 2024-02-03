<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/Product', [ProductController::class, 'index'])->name ('product.index');
Route::get('/Product/create', [ProductController::class, 'create'])->name('product.create');
Route::POST('/Product', [ProductController::class, 'store'])->name ('product.store');
Route::get('/Product/{product}/edit', [ProductController::class, 'edit'])->name ('product.edit');
Route::put('/Product/{product}/update', [ProductController::class, 'update'])->name ('product.update');
Route::delete('/Product/{product}/destroy', [ProductController::class, 'destroy'])->name ('product.destroy');


Route::get('/Category', [CategoryController::class, 'index'])->name ('category.index');
Route::get('/Category/create', [CategoryController::class, 'create'])->name('category.create');
Route::POST('/Category', [CategoryController::class, 'store'])->name ('category.store');
Route::get('/Category/{category}/edit', [CategoryController::class, 'edit'])->name ('category.edit');
Route::put('/Category/{category}/update', [CategoryController::class, 'update'])->name ('category.update');
Route::delete('/Category/{category}/destroy', [CategoryController::class, 'destroy'])->name ('category.destroy');

Route::get('get',[ProductController::class,'category']);