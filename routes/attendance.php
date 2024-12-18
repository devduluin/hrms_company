<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Leave\LeaveApplicantController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Attendance\AttendanceRequestController;
use App\Http\Controllers\Attendance\HolidayListController;
use App\Http\Controllers\Attendance\AttendanceActivityController;

use Illuminate\Support\Facades\Route;

Route::prefix('/attendance')->group(function () {
    Route::controller(Attendance\AttendanceController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.attendance');

        Route::get('/attendance', 'attendance')->name('hrms.attendance.attendance');
        Route::get('/create', 'create')->name('hrms.attendance.create');
        Route::get('/update/{id}', 'update')->name('hrms.attendance.update');
        Route::get('/detail/{id}', 'detail')->name('detail'); 

        Route::get('/report', 'report')->name('report');
        Route::get('/summary', 'summary')->name('summary');
        Route::get('/report/print', 'print')->name('hrms.attendance.print');

        Route::prefix('/activity')->group(function () {
            Route::controller(AttendanceActivityController::class)->group(function () {
                Route::get('/', 'index')->name('hrms.attendance.activity');
                Route::get('/create', 'create')->name('hrms.attendance.activity.create');
                Route::get('/update/{id}', 'update')->name('hrms.attendance.activity.update');
                Route::get('/detail/{id}', 'detail')->name('hrms.attendance.activity.detail');
            });;
        });

        Route::prefix('/request')->group(function () {
            Route::controller(AttendanceRequestController::class)->group(function () {
                Route::get('/', 'index')->name('hrms.attendance.request');
                Route::get('/create', 'create')->name('hrms.attendance.request.create');
                Route::get('/update/{id}', 'update')->name('hrms.attendance.request.update');
                Route::get('/detail/{id}', 'detail')->name('hrms.attendance.request.detail');
            });;
        });
        
        Route::prefix('/shift_type')->group(function () {
            Route::controller(ShiftTypeController::class)->group(function () {
                Route::get('/', 'index')->name('hrms.attendance.shifttype');
                Route::get('/create', 'create')->name('hrms.attendance.shifttype.create');
                Route::get('/update/{id}', 'update')->name('hrms.attendance.shifttype.update');
            });;
        });

        Route::prefix('/shift_request_approver')->group(function () {
            Route::controller(ShiftRequestController::class)->group(function () {
                Route::get('/', 'index')->name('hrms.attendance.shiftrequest');
                Route::get('/create', 'create')->name('hrms.attendance.shiftrequest.create');
                Route::get('/update/{id}', 'update')->name('hrms.attendance.shiftrequest.update');
            });
        });
    });

    //route for shift assignment
    Route::controller(Attendance\ShfitAssigmentController::class)->group(function() {
        Route::get('shift-assignment', 'index')->name('hrms.shift-assignment');
        Route::get('shift-assignment/create', 'create')->name('hrms.shift-assignment.create');
        
        Route::get('shift-assignment/create_bulk', 'create_bulk')->name('hrms.shift-assignment.create_bulk');
        Route::get('shift-assignment/update/{id}', 'update')->name('hrms.shift-assignment.update');
    });
    //end route for shift assignment
});

//leave modules
Route::prefix('/leave')->group(function () {
    Route::controller(LeaveController::class)->group(function () {
        Route::get('/', 'index')->name('payout');

        Route::prefix('/holiday_list')->group(function () {
            Route::controller(HolidayListController::class)->group(function () {
                Route::get('/', 'index')->name('hrms.attendance.holiday_list');
                Route::get('/create', 'create')->name('hrms.attendance.holiday_list.create');
                Route::get('/update/{id}', 'update')->name('hrms.attendance.holiday_list.update');
                Route::get('/detail/{id}', 'detail')->name('hrms.attendance.holiday_list.detail');
            });;
        });
        
        Route::prefix('/application')->group(function () {
            Route::controller(LeaveApplicantController::class)->group(function () {
                Route::get('/', 'index')->name('hrms.leave.application');
                Route::get('/create', 'create')->name('hrms.leave.application.create');
                Route::get('/update/{id}', 'update')->name('hrms.leave.application.update');
                Route::get('/detail/{id}', 'detail')->name('hrms.leave.application.detail');
            });
        });
        
        Route::get('/holiday', 'holiday')->name('holiday_list');
        Route::get('/create_holiday', 'create_holiday')->name('create_holiday');
        Route::get('/allocation', 'allocation')->name('allocation');
        Route::get('/create_allocation', 'create_allocation')->name('allocation');
        Route::get('/application', 'application')->name('application');
        Route::get('/create_application', 'create_application')->name('allocation');
    });
});
