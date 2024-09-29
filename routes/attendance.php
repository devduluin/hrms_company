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
        Route::get('/new_shift_assignment', 'new_assignment')->name('shift');
    });
});

//leave modules
Route::prefix('/leave')->group(function () {
    Route::controller(LeaveController::class)->group(function () {
        Route::get('/', 'index')->name('payout');
    });
});
