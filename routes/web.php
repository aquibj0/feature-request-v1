<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAppController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/user-app', [UserAppController::class, 'index'])->name('app.index');
    Route::get('/user-app/store-date', [UserAppController::class, 'storeData'])->name('app.store-data');
    Route::post('/user-app/store', [UserAppController::class, 'store'])->name('app.store');
    Route::delete('/user-app/{app-id}/destroy', [UserAppController::class, 'destroy'])->name('app.destroy');




});

require __DIR__.'/auth.php';
