<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('/graph')->group(function () {
    Route::controller(GraphController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.graph');
    });
});