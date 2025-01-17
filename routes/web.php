<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware(['auth'])->group(static function () {
    Route::prefix('messages')->name('messages.')->group(static function () {
        Route::post('/', [MessageController::class, 'store'])->name('store');
    });

    Route::prefix('games')->name('games.')->group(static function () {
        Route::post('/', [GameController::class, 'store'])->name('store');
        Route::put('{game:game_id}', [GameController::class, 'update'])->name('update');
        Route::get('{game:game_id}', [GameController::class, 'show'])->name('show');

        Route::put('{game:game_id}/command', [GameController::class, 'run_command'])->name('command');
    });
});
