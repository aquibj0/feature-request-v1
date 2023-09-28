<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FeatureRequestController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/{id}/feature-request', [FeatureRequestController::class, 'index'])->name('feature-request.index');
Route::middleware('auth')->group(function () {

    // Endpoint to store a new feature request
    Route::post('/{id}/feature-request/store', [FeatureRequestController::class, 'store'])->name('feature-request.store');
    Route::put('/feature-request/{feature-request-id}', [FeatureRequestController::class, 'updateStatus']);
    

});