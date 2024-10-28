<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payroll\PayrollSettingController;
use Illuminate\Support\Facades\Route;

// claim modules
Route::prefix('/claim')->group(function () {
    Route::controller(ClaimController::class)->group(function () {
        Route::get('/', 'index')->name('claim');
        Route::get('/summary', 'summary')->name('summary');
        Route::get('/travel_request', 'travel_request')->name('travel_request');
        Route::get('/travel_list', 'travel_list')->name('travel_list');
    });
});

Route::prefix('/payout')->group(function () {
    Route::controller(PayoutController::class)->group(function () {
        Route::get('/', 'index')->name('payout');
        Route::get('/salary_slip', 'salary_slip')->name('salary_slip');
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
        Route::get('/payroll_period', 'payroll_period')->name('payroll_period');
        Route::prefix('salary_component')->group(function () {
            Route::get('/list_component', 'salary_component_list')->name('list_component');
            Route::get('/create_component', 'create_component')->name('create_component');
            Route::get('/edit_component/{id}', 'edit_component')->name('edit_component');
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
