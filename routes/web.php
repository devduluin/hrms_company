<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HrmsController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BranchController;
use App\Http\Middleware\VerifyAjaxRequest;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ShiftTypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HolidaydateController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ShiftRequestController;
use App\Http\Controllers\Response\AuthResponseController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\LeaveController;


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
            Route::get('/signout', 'logout');
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

                Route::middleware(['isAjax', 'isLoggedIn'])->group(function () {
                    Route::prefix('/elm')->group(function () {
                        Route::get('/settings', 'elm_settings');
                        Route::get('/email_setting', 'elm_email_setting');
                        Route::get('/user_account', 'elm_account');
                        Route::get('/security', 'elm_security');
                        Route::get('/preferences', 'elm_preferences');
                        Route::get('/notification_setting', 'elm_notification_setting');
                        Route::get('/deactivation', 'elm_deactivation');
                    });
                });
            });
        });

        Route::middleware('isLoggedIn')->group(function () {
            Route::controller(HrmsController::class)->group(function () {
                Route::prefix('/hrms')->group(function () {
                    Route::get('/', 'index')->name('hrms');


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
                        });
                    });

                    //employees modules
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

                    // attendance modules
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

                    // claim modules
                    Route::prefix('/claim')->group(function () {
                        Route::controller(ClaimController::class)->group(function () {
                            Route::get('/', 'index')->name('claim');
                            Route::get('/summary', 'summary')->name('summary');
                            Route::get('/travel_request', 'travel_request')->name('travel_request');
                            Route::get('/travel_list', 'travel_list')->name('travel_list');
                        });
                    });

                    //payroll modules
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
            });
        });
    });
});
