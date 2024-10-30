<?php

namespace App\Http\Controllers; 
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('/users')->group(function () {
    Route::controller(UsersController::class)->group(function () {
        Route::get('/', 'index')->name('users');
        Route::get('/create', 'create')->name('user.create');
        Route::get('/update/{id}', 'update')->name('user.update');
        
    });
});

