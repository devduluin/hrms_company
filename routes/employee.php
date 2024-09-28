<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('/employee')->group(function () {
    Route::controller(EmployeesController::class)->group(function () {
        Route::get('/', 'list')->name('hrms');
        Route::get('/list', 'list')->name('employee');
        Route::get('/edit_employee/{id}', 'edit');
        Route::get('/new_employee', 'create');
        Route::get('/update_employee', 'update');
    });
});

//recruitment modules
Route::prefix('/recruitment')->group(function () {
    Route::controller(RecruitmentController::class)->group(function () {
        Route::get('/', 'index')->name('employee');
        Route::get('/create_applicant', 'create')->name('create_applicant');
    });
});