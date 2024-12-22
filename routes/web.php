<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\QuotasController;
use App\Http\Controllers\Frontend\TraineeController;
use App\Http\Controllers\Admin\InstituteTypeController;
use App\Http\Controllers\Admin\CourseDurationController;
use App\Http\Controllers\Admin\ApplicationDateController;
use App\Http\Controllers\Frontend\TraineeNewPasswordController;
use App\Http\Controllers\Frontend\TraineePasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.landing');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');
});


// Customer Password Reset Routes
Route::get('/trainee/forgot-password', [TraineePasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('trainee.password.request');

Route::post('/trainee/forgot-password', [TraineePasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('trainee.password.email');

Route::get('/trainee/reset-password/{token}', [TraineeNewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('trainee.password.reset');

Route::post('/trainee/reset-password', [TraineeNewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('trainee.password.update');


Route::get('/mail', function () {
    return view('email.trainee-password-reset');
});


Route::get('/login', [TraineeController::class, 'login'])->name('trainee.login');
Route::post('/login', [TraineeController::class, 'loginPost'])->name('trainee.login.post');
Route::get('/register', [TraineeController::class, 'register'])->name('trainee.register');
Route::post('/register', [TraineeController::class, 'registerPost'])->name('trainee.register.post');


Route::group(['middleware' => ['trainee'], 'prefix' => 'trainee'], function () {
    Route::get('/application', [\App\Http\Controllers\Frontend\ApplicationController::class, 'index'])->name('trainee.application.index');
    Route::get('/application-create', [\App\Http\Controllers\Frontend\ApplicationController::class, 'create'])->name('trainee.application.create');
    Route::post('/application-create', [\App\Http\Controllers\Frontend\ApplicationController::class, 'store'])->name('trainee.application.store');
    Route::get('/application/{id}/edit', [\App\Http\Controllers\Frontend\ApplicationController::class, 'edit'])->name('trainee.application.edit');
    Route::post('/application/{id}/edit', [\App\Http\Controllers\Frontend\ApplicationController::class, 'update'])->name('trainee.application.update');
    //asdasd

    Route::get('/trainee/{application}/certificate', [\App\Http\Controllers\Admin\ApplicationController::class, 'certificate'])->name('trainee.application.certificate');
    Route::get('/{id}/view', [\App\Http\Controllers\Frontend\ApplicationController::class, 'show'])->name('trainee.application.view');
    //Feedback
    // Route::get('/feedback', [\App\Http\Controllers\TraineeFeedbackController::class, 'index'])->name('trainee.feedback.index');
    Route::get('/feedback-create', [\App\Http\Controllers\TraineeFeedbackController::class, 'create'])->name('trainee.feedback.create');
    Route::post('/feedback-create', [\App\Http\Controllers\TraineeFeedbackController::class, 'store'])->name('trainee.feedback.store');
});

Route::group(['middleware' => ['auth:web,trainee'], 'prefix' => 'admin'], function () {
    //Common
    Route::get('get-district', [\App\Http\Controllers\DistrictController::class, 'getDistrictByDivision'])->name('get.district');
    Route::get('get-sub-district', [\App\Http\Controllers\UpazilaController::class, 'getSubDistrictByDistrict'])->name('get.sub_district');
    Route::get('get-unions', [\App\Http\Controllers\UnionController::class, 'getUnionBySubDistrict'])->name('get.unions');
});
Route::group(['middleware' => ['auth:web'], 'prefix' => 'admin'], function () {

    Route::group(['prefix' => 'application'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('admin.application.index');
        Route::get('/approved', [\App\Http\Controllers\Admin\ApplicationController::class, 'approvedIndex'])->name('admin.application.approved');
        Route::get('/canceled', [\App\Http\Controllers\Admin\ApplicationController::class, 'canceledIndex'])->name('admin.application.canceled');
        Route::get('/create', [\App\Http\Controllers\Admin\ApplicationController::class, 'create'])->name('admin.application.create');
        Route::post('/create', [\App\Http\Controllers\Admin\ApplicationController::class, 'store'])->name('admin.application.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\ApplicationController::class, 'edit'])->name('admin.application.edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\ApplicationController::class, 'update'])->name('admin.application.update');
        Route::get('/{id}/view', [\App\Http\Controllers\Admin\ApplicationController::class, 'show'])->name('admin.application.view');
        Route::get('/export', [\App\Http\Controllers\Admin\ApplicationController::class, 'export'])->name('admin.application.export');
        Route::get('/approve', [\App\Http\Controllers\Admin\ApplicationController::class, 'approve'])->name('admin.application.approve');
        Route::post('/change-status', [\App\Http\Controllers\Admin\ApplicationController::class, 'changeStatus'])->name('admin.application.multiple.status.change');
        Route::post('/enrolled', [\App\Http\Controllers\Admin\ApplicationController::class, 'enrolled'])->name('admin.application.enrolled');
        Route::post('/passed', [\App\Http\Controllers\Admin\ApplicationController::class, 'passed'])->name('admin.application.passed');
        Route::post('/failed', [\App\Http\Controllers\Admin\ApplicationController::class, 'failed'])->name('admin.application.failed');
    });
    Route::get('/{application}/certificate', [\App\Http\Controllers\Admin\ApplicationController::class, 'certificate'])->name('admin.application.certificate');
    Route::group(['prefix' => 'courses'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ActiveCoursesController::class, 'index'])->name('admin.courses.index');
        Route::get('/{id}/application-list', [\App\Http\Controllers\Admin\ActiveCoursesController::class, 'applicationList'])->name('admin.courses.applicationList');
    });
    Route::group(['prefix' => 'configure'], function () {

        Route::group(['prefix' => 'application-date'], function () {
            Route::get('/', [ApplicationDateController::class, 'index'])->name('admin.config.application.date.index');
            Route::get('/create', [ApplicationDateController::class, 'create'])->name('admin.config.application.date.create');
            Route::post('/create', [ApplicationDateController::class, 'store'])->name('admin.config.application.date.store');
            Route::get('/edit/{id}', [ApplicationDateController::class, 'edit'])->name('admin.config.application.date.edit');
            Route::post('/edit/{id}', [ApplicationDateController::class, 'update'])->name('admin.config.application.date.update');
            Route::get('/export', [ApplicationDateController::class, 'export'])->name('admin.config.application.date.export');
        });

        Route::group(['prefix' => 'course'], function () {
            Route::get('/', [CourseController::class, 'index'])->name('admin.config.course.index');
            Route::get('/create', [CourseController::class, 'create'])->name('admin.config.course.create');
            Route::post('/create', [CourseController::class, 'store'])->name('admin.config.course.store');
            Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('admin.config.course.edit');
            Route::post('/edit/{id}', [CourseController::class, 'update'])->name('admin.config.course.update');
            Route::get('/export', [CourseController::class, 'export'])->name('admin.config.course.export');
        });
        Route::group(['prefix' => 'education'], function () {
            Route::get('/', [EducationController::class, 'index'])->name('admin.config.education.index');
            Route::get('/create', [EducationController::class, 'create'])->name('admin.config.education.create');
            Route::post('/create', [EducationController::class, 'store'])->name('admin.config.education.store');
            Route::get('/edit/{id}', [EducationController::class, 'edit'])->name('admin.config.education.edit');
            Route::post('/edit/{id}', [EducationController::class, 'update'])->name('admin.config.education.update');
            Route::get('/export', [EducationController::class, 'export'])->name('admin.config.educations.export');
        });
        Route::group(['prefix' => 'quota'], function () {
            Route::get('/', [QuotasController::class, 'index'])->name('admin.config.quota.index');
            Route::get('/create', [QuotasController::class, 'create'])->name('admin.config.quota.create');
            Route::post('/create', [QuotasController::class, 'store'])->name('admin.config.quota.store');
            Route::get('/edit/{id}', [QuotasController::class, 'edit'])->name('admin.config.quota.edit');
            Route::post('/edit/{id}', [QuotasController::class, 'update'])->name('admin.config.quota.update');
            Route::get('/export', [QuotasController::class, 'export'])->name('admin.config.quota.export');
        });
        Route::group(['prefix' => 'institute-type'], function () {
            Route::get('/', [InstituteTypeController::class, 'index'])->name('admin.config.institute.type.index');
            Route::get('/create', [InstituteTypeController::class, 'create'])->name('admin.config.institute.type.create');
            Route::post('/create', [InstituteTypeController::class, 'store'])->name('admin.config.institute.type.store');
            Route::get('/edit/{id}', [InstituteTypeController::class, 'edit'])->name('admin.config.institute.type.edit');
            Route::post('/edit/{id}', [InstituteTypeController::class, 'update'])->name('admin.config.institute.type.update');
            Route::get('/export', [InstituteTypeController::class, 'export'])->name('admin.config.institute.type.export');
        });
        Route::group(['prefix' => 'course-duration'], function () {
            Route::get('/', [CourseDurationController::class, 'index'])->name('admin.config.course.duration.index');
            Route::get('/create', [CourseDurationController::class, 'create'])->name('admin.config.course.duration.create');
            Route::post('/create', [CourseDurationController::class, 'store'])->name('admin.config.course.duration.store');
            Route::get('/edit/{id}', [CourseDurationController::class, 'edit'])->name('admin.config.course.duration.edit');
            Route::post('/edit/{id}', [CourseDurationController::class, 'update'])->name('admin.config.course.duration.update');
            Route::get('/export', [CourseDurationController::class, 'export'])->name('admin.config.course.duration.export');
        });
        Route::group(['prefix' => 'trainee-age'], function () {
            Route::get('/', [TraineeController::class, 'ageIndex'])->name('admin.config.trainee-age.index');
            // Route::get('/create', [TraineeController::class, 'create'])->name('admin.config.trainee-age.create');
            Route::post('/store', [TraineeController::class, 'ageStore'])->name('admin.config.trainee-age.store');
            // Route::get('/edit/{id}', [TraineeController::class, 'edit'])->name('admin.config.trainee-age.edit');
            // Route::post('/edit/{id}', [TraineeController::class, 'update'])->name('admin.config.trainee-age.update');
            // Route::get('/export', [TraineeController::class, 'export'])->name('admin.config.trainee-age.export');
        });
    });


    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/export', [UserController::class, 'export'])->name('admin.user.export');
        Route::get('/change-status', [UserController::class, 'changeStatus'])->name('admin.user.change-status');
    });
    // Feedback
    Route::get('/trainee-feedback', [\App\Http\Controllers\TraineeFeedbackController::class, 'adminIndex'])->name('admin.feedback.index');
});


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return 'success';
});