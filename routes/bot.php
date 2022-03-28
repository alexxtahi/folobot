<?php

use App\Http\Controllers\BotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'bot'], function () {
    // testing bot
    Route::get('/test', [BotController::class, 'test']);
    // get conversations list
    Route::get('/conversations', [BotController::class, 'conversationsList']);
    // send message to a specific channel
    Route::post('/message', [BotController::class, 'sendMessage'])->name('bot.message');
});
