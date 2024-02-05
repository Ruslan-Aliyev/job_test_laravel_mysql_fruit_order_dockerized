<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::resource('fruit', \App\Http\Controllers\FruitController::class, [
        'except' => ['show', 'create', 'edit']
    ]);
    Route::resource('order', \App\Http\Controllers\OrderController::class, [
        'except' => ['show', 'create', 'edit', 'update', 'destroy']
    ]);
    Route::post('add', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
    Route::post('save', [\App\Http\Controllers\OrderController::class, 'save'])->name('order.save');
    Route::post('print', [\App\Http\Controllers\OrderController::class, 'print'])->name('order.print');
});

require __DIR__.'/auth.php';
