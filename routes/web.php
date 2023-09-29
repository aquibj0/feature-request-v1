<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureRequestController;
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

Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user-app', [UserAppController::class, 'index'])->name('app.index');
    // Route::get('/user-app/store-date', [UserAppController::class, 'storeData'])->name('app.store-data');
    Route::post('/user-app/save-custom-domain', [UserAppController::class, 'saveCustomDomain'])->name('save.custom.domain');
    Route::get('/user-app/access-keys', [UserAppController::class, 'accessKeys'])->name('app.keys');
    Route::get('/user-app/how-to-use', [UserAppController::class, 'howToUse'])->name('app.use');
    Route::post('/user-app/store', [UserAppController::class, 'store'])->name('app.store');
    Route::delete('/user-app/{app-id}/destroy', [UserAppController::class, 'destroy'])->name('app.destroy');

    Route::get('/feature-request', [FeatureRequestController::class, 'getFeatureRequests'])->name('feature-req.index');
    Route::get('/feature-request/status/{status}', [FeatureRequestController::class, 'getFeatureRequestStatus'])->name('feature-request.status');
    Route::get('/feature-request/{id}', [FeatureRequestController::class, 'show'])->name('feature-req.show');
    Route::put('/feature-request/{id}/update', [FeatureRequestController::class, 'updateStatus'])->name('feature-req.update');

    Route::post('/feature-request/{id}/comment/store', [FeatureRequestController::class, 'addComment'])->name('comment.store');

});

Route::get('/{slug}', [UserAppController::class, 'profile'])->name('app.profile');


require __DIR__.'/auth.php';
