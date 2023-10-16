<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/**
 * for manipulate EventController
 */
Route::prefix("/event")->group(function(){
    Route::get('/', [App\Http\Controllers\EventController::class, 'index']);
    Route::post('/register', [App\Http\Controllers\EventController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\EventController::class, 'update']);
});