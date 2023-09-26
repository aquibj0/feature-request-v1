<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAppController;
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

Route::middleware(['auth', 'api-auth'])->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/{user-id}/user-app', [UserAppController::class, 'indez'])->name('app.index');
    Route::post('/{user-id}/user-app/store', [UserAppController::class, 'store'])->name('app.store');
    Route::delete('/{user-id}/user-app/{app-id}/destroy', [UserAppController::class, 'destroy'])->name('app.destroy');


    

});

require __DIR__.'/auth.php';
