<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Claim\ClaimController;
use App\Http\Controllers\Claim\ExpenseController;
use App\Http\Controllers\Claim\AdvanceController;
use App\Http\Controllers\Claim\TravelController;
use App\Http\Controllers\Claim\TypeController;

// claim modules
Route::prefix('/claim')->group(function () {
    Route::controller(ClaimController::class)->group(function () {
        Route::get('/', 'index')->name('claim');
        Route::controller(ExpenseController::class)->group(function () {
            Route::prefix('expense')->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
                Route::get('/detail/{id}', 'show');
            });
        });
        Route::controller(AdvanceController::class)->group(function () {
            Route::prefix('advance')->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
                Route::get('/detail/{id}', 'show');
            });
        });
        Route::controller(TypeController::class)->group(function () {
            Route::prefix('type')->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
                Route::get('/detail/{id}', 'show');
            });
        });
        Route::controller(TravelController::class)->group(function () {
            Route::prefix('purpose_travel')->group(function () {
                Route::get('/', 'purpose_travel');
                Route::get('/create', 'create_purpose_travel');
            });
            Route::prefix('travel')->group(function () {
                Route::get('/', 'index');
                Route::get('/purpose_travel', 'purpose_travel');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
                Route::get('/detail/{id}', 'show');
            });
        });

        Route::get('/summary', 'summary')->name('summary');
        Route::get('/travel_request', 'travel_request')->name('travel_request');
        Route::get('/travel_list', 'travel_list')->name('travel_list');
    });
});
 