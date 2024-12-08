<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payroll\PayslipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payroll\PayrollPeriodeController;
use App\Http\Controllers\Payroll\PayrollSettingController;
use App\Http\Controllers\Payroll\SalaryComponentController;

Route::prefix('/payout')->group(function () {
    Route::controller(PayoutController::class)->group(function () {
        Route::get('/', 'index')->name('payout');
        // Route::get('/salary_slip', 'salary_slip')->name('salary_slip');
        Route::controller(PayslipController::class)->group(function () {
            Route::prefix('salary_slip')->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
                Route::get('/detail/{id}', 'show');
            });
            Route::prefix('payroll_entry')->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'bulk_create');
            });
        });
        Route::controller(PayrollSettingController::class)->group(function () {
            Route::prefix('settings')->group(function () {
                Route::get('/list', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
            });
        });
        // Route::get('/settings', 'settings')->name('settings');
        Route::get('/income_tax', 'income_tax')->name('income_tax');
        Route::get('/benefit_claim', 'benefit_claim')->name('benefit_claim');
        Route::get('/tax_slab_list', 'tax_slab_list')->name('tax_slab_list');
        Route::get('/benefit_list', 'benefit_list')->name('benefit_list');
        Route::controller(PayrollPeriodeController::class)->group(function () {
            Route::prefix('payroll_period')->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
            });
        });
        Route::controller(SalaryComponentController::class)->group(function () {
            Route::prefix('salary_component')->group(function () {
                Route::get('/list_component', 'index')->name('list_component');
                Route::get('/create_component', 'create')->name('create_component');
                Route::get('/edit_component/{id}', 'edit')->name('edit_component');
            });
        });
        Route::prefix('/salary_structure')->group(function () {
            Route::controller(SalaryStructureController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
            });
        });
        Route::prefix('/salary_structure_assignment')->group(function () {
            Route::controller(SalaryStructureAssignmentController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/edit/{id}', 'edit');
            });
            Route::prefix('/bulk_assignment')->group(function () {
                Route::controller(BulkAssignmentController::class)->group(function () {
                    // Route::get('/', 'index');
                    Route::get('/create', 'create');
                    // Route::get('/edit/{id}', 'edit');
                });
            });
        });
        Route::prefix('/bulk_assignment')->group(function () {
            Route::controller(BulkAssignmentController::class)->group(function () {
                // Route::get('/', 'index');
                Route::get('/create', 'create');
                // Route::get('/edit/{id}', 'edit');
            });
        });
    });
});
