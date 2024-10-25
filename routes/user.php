<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('user');
    });
});