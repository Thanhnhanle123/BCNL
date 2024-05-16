<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DrinkController;
use App\Models\Category;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('home')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home.index');
});
// category
Route::prefix('category')->group(function () {
    Route::get('/',           [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create',     [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/create',    [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


// drink
Route::prefix('drink')->group(function () {
    Route::get('/',             [DrinkController::class, 'index'])->name('drink.index');
    Route::get('/create',       [DrinkController::class, 'create'])->name('drink.create');
    Route::post('/create',      [DrinkController::class, 'store'])->name('drink.store');
    Route::get('/edit/{id}',    [DrinkController::class, 'edit'])->name('drink.edit');
    Route::post('/update',      [DrinkController::class, 'update'])->name('drink.update');
    Route::get('/destroy/{id}', [DrinkController::class, 'destroy'])->name('drink.destroy');
});


