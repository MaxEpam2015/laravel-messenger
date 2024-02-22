<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

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

Route::middleware(['api-csrf-token', 'throttle.with.redis'])->group(function () {
    Route::get('messages/{receiver_number}', [MessageController::class, 'get']);
    Route::post('messages/send', [MessageController::class, 'send']);
});


