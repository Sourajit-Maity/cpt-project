<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\CompletedJobsController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\JobapplyDetailsController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SecurityQuestionController;
use App\Http\Controllers\Admin\NurseTypeController;
use App\Http\Controllers\Admin\ShifTimeController;
use Illuminate\Support\Facades\Route;
 

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
Route::redirect('/','admin');
Route::redirect('admin','admin/login');

Route::group(['prefix' => 'admin', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');

    Route::get('/info/{nurse}', [NurseController::class, 'nurseInfo'])->name('admin.nurse.info');
    Route::get('/hospital-info/{hospital}', [HospitalController::class, 'hospitalInstituteInfo'])->name('admin.hospital.details');

    //Cms Management
    Route::resource('cms', CmsController::class)->only(['index', 'edit']);

    Route::resources([
        'users' => UserController::class,
        'countries' => CountryController::class,
        'states' => StateController::class,
        'cities' => CityController::class,
        'experiences' => ExperienceController::class,
        'skills' => SkillController::class,
        'languages' => LanguageController::class,
        'nurse' => NurseController::class,
        'hospital' => HospitalController::class,
        'jobs' => JobsController::class,
        'complete-jobs' => CompletedJobsController::class,
        'payments' => PaymentController::class,
        'job-apply-details' => JobapplyDetailsController::class,
        'security-question' => SecurityQuestionController::class,
        'nurse-type' => NurseTypeController::class,
        'shift-time' => ShifTimeController::class,
        'projects' => NurseTypeController::class,
    ]);
});

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'Cleared.';
});