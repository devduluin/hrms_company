<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Response\AuthResponseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HrmsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\VerifyAjaxRequest;
use Illuminate\Http\Request;


Route::controller(AuthController::class)->group(function () {
    Route::prefix('/')->group(function () {
		Route::get('/', function (Request $request) {			
				return redirect()->route('signin');
			})->name('index'); 
		Route::middleware('isActivated')->group(function () {
			Route::get('/signin', 'index')->name('signin');
			Route::get('/signup', 'index')->name('signup');
			Route::get('/forgot_password', 'index')->name('forgot-password');
			Route::get('/password-recovery/{token}', 'elm_password_recovery')->name('elm_password_recovery');
		});
		Route::get('/unactivated', 'unactivated')->name('unactivated');
    });
    Route::controller(AuthResponseController::class)->group(function () {
        Route::prefix('/auth')->group(function () {
            Route::post('/signin', 'signin');
            Route::post('/signup', 'index');
            Route::post('/forgot_password', 'index');
            Route::post('/password-recovery/{token}', 'elm_password_recovery')->name('elm_password_recovery');
        });
    });
    Route::middleware(['isAjax', 'isActivated'])->group(function () {
        Route::prefix('/elm')->group(function () {
            Route::get('/signin', 'elm_signin')->name('elm_signin');
            Route::get('/signup', 'elm_signup')->name('elm_signup');
            Route::get('/forgot_password', 'elm_forgot_password')->name('elm_forgot_password');
        });
    });
});



Route::controller(DashboardController::class)->group(function () {
	
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', 'index')->name('dashboard');
       
        Route::controller(SettingsController::class)->group(function () {
            Route::prefix('/settings')->group(function () {
                Route::get('/', 'index')->name('settings');
                Route::get('/{any}', 'index');
                
                Route::middleware('isAjax')->group(function () {
                    Route::prefix('/elm')->group(function () {
                        Route::get('/settings', 'elm_settings');
                        Route::get('/email_setting', 'elm_email_setting');
                        Route::get('/security', 'elm_security');
                        Route::get('/preferences', 'elm_preferences');
                        Route::get('/notification_setting', 'elm_notification_setting');
                        Route::get('/deactivation', 'elm_deactivation');
                    
                    });
                });
            });
        });

        Route::controller(HrmsController::class)->group(function () {
            Route::prefix('/hrms')->group(function () {
                Route::get('/', 'index')->name('hrms');
                
                
                //employees modules
                
                Route::prefix('/employee')->group(function () {
                    Route::controller(EmployeesController::class)->group(function () {
                        Route::get('/', 'index')->name('hrms');
                        Route::get('/list', 'list')->name('employee');
                        Route::get('/new_employee', 'create');
                        Route::get('/update_employee', 'update');
     
                    });
                });

                //recruitment modules
                Route::prefix('/recruitment')->group(function () {
                    Route::controller(RecruitmentController::class)->group(function () {
                        Route::get('/', 'index')->name('employee');
                       
                    });
                });

                //other modules




                //dynamic content
                //Route::get('/{any}', 'index');
                Route::middleware('isAjax')->group(function () {
                    Route::prefix('/elm')->group(function () {
                        Route::get('/hrms', 'elm_hrms');
                        Route::get('/employees', 'elm_overview');
                    });
                    
                });

            });

            Route::prefix('/payroll')->group(function () {

            });
        });
    });
});
