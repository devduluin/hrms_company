<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

//leave modules
Route::prefix('/leave')->group(function () {
    Route::controller(LeaveController::class)->group(function () {
        Route::get('/', 'index')->name('payout');
    });
});
