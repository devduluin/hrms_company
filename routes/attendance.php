<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('/attendance')->group(function () {
    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/', 'index')->name('attendance');
        Route::get('/summary', 'summary')->name('hrms.attendance.summary');
        Route::get('/detail/{id}', 'detail')->name('detail');
        // Route::get('/shift_assignment', 'shift')->name('shift');
        Route::get('/shift_list', 'shift_list')->name('shift_list');
        Route::get('/report', 'report')->name('report');
        Route::get('/new_shift_assignment', 'new_assignment')->name('shift-assignment');
        Route::get('/shift_type', 'shift_type')->name('shift_type');
        Route::get('/new_shift_type', 'new_shift_type')->name('new_shift_type');
    });

    //route for shift assignment
    Route::controller(Attendance\ShfitAssigmentController::class)->group(function() {
        Route::get('shift-assignment', 'index')->name('hrms.shift-assignment');
        Route::get('shift-assignment/cretae', 'create')->name('hrms.shift-assignment.create');
    });
    //end route for shift assignment
});

//leave modules
Route::prefix('/leave')->group(function () {
    Route::controller(LeaveController::class)->group(function () {
        Route::get('/', 'index')->name('payout');
        Route::get('/holiday', 'holiday')->name('holiday_list');
        Route::get('/create_holiday', 'create_holiday')->name('create_holiday');
        Route::get('/allocation', 'allocation')->name('allocation');
        Route::get('/create_allocation', 'create_allocation')->name('allocation');
        Route::get('/application', 'application')->name('application');
        Route::get('/create_application', 'create_application')->name('allocation');
    });
});
