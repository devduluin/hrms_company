<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('/attendance')->group(function () {
    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/', 'index')->name('attendance');
        Route::get('/summary', 'summary')->name('summary');
        Route::get('/detail/{id}', 'detail')->name('detail');
        Route::get('/shift_assignment', 'shift')->name('shift');
        Route::get('/shift_list', 'shift_list')->name('shift_list');
        Route::get('/report', 'report')->name('report');
    });
});

// claim modules
Route::prefix('/claim')->group(function () {
    Route::controller(ClaimController::class)->group(function () {
        Route::get('/', 'index')->name('claim');
        Route::get('/summary', 'summary')->name('summary');
        Route::get('/travel_request', 'travel_request')->name('travel_request');
        Route::get('/travel_list', 'travel_list')->name('travel_list');
    });
});