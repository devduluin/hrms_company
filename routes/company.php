<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('/company')->group(function () {
    Route::controller(CompaniesController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.company');
        Route::get('/new_company', 'create')->name('hrms.company.create');
        Route::get('/edit_company', 'edit')->name('hrms.company.edit');;
        Route::get('/show', 'show')->name('hrms.company.show');
        Route::get('/preview', 'preview')->name('hrms.company.preview');
    });
});

Route::prefix('/applicants')->group(function () {
    Route::controller(ApplicantController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.applicants');
    });
});

Route::prefix('/branch')->group(function () {
    Route::controller(BranchController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.branch');
        Route::get('/create', 'create')->name('hrms.branch.create');
    });
});

Route::prefix('/currency')->group(function () {
    Route::controller(CurrencyController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.currency');
        Route::get('/create', 'create')->name('hrms.currency.create');
    });
});

Route::prefix('/designation')->group(function () {
    Route::controller(DesignationController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.designation');
        Route::get('/create', 'create')->name('hrms.designation.create');
    });
});

Route::prefix('/department')->group(function () {
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.department');
        Route::get('/create', 'create')->name('hrms.department.create');
    });
});

Route::prefix('/holiday-date')->group(function () {
    Route::controller(HolidaydateController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.holidaydate');
        Route::get('/create', 'create')->name('hrms.holidaydate.create');
    });
});

Route::prefix('/jobs')->group(function () {
    Route::controller(JobController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.jobs');
        Route::get('/create', 'create')->name('hrms.job.create');
    });
});

Route::prefix('/leave-type')->group(function () {
    Route::controller(LeaveTypeController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.leave-type');
        Route::get('/create', 'create')->name('hrms.leave-type.create');
    });
});

Route::prefix('/shift-request-approver')->group(function () {
    Route::controller(ShiftRequestController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.shiftrequest');
    });
});

Route::prefix('/shift-type')->group(function () {
    Route::controller(ShiftTypeController::class)->group(function () {
        Route::get('/', 'index')->name('hrms.shifttype');
        Route::get('/create', 'create')->name('hrms.shifttype.create');
    });
});