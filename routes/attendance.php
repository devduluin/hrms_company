<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('/payout')->group(function () {
    Route::controller(PayoutController::class)->group(function () {
        Route::get('/', 'index')->name('payout');
        Route::get('/salary_slip', 'salary_slip')->name('salary_slip');
        Route::get('/settings', 'settings')->name('settings');
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
        Route::get('/salary_structure', 'salary_structure')->name('salary_structure');
    });
});

//leave modules
Route::prefix('/leave')->group(function () {
    Route::controller(LeaveController::class)->group(function () {
        Route::get('/', 'index')->name('payout');
    });
});