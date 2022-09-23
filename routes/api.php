<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserComonController;
use App\Http\Controllers\API\hospital\UserController;
use App\Http\Controllers\API\nurses\NurseJobController;
use App\Http\Controllers\API\nurses\NurseUserController;
use App\Http\Controllers\API\nurses\NursePaymentController;
use App\Http\Controllers\API\hospital\HospitalJobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// user controller routes


Route::post("forgot-password", [UserComonController::class, 'forgotPassword']);
Route::post("otp-validation", [UserComonController::class, 'forgotPasswordotpValidate']);
//security-question
Route::get('security-question', [UserComonController::class, 'securityQuestion']);

//nurse type
Route::get('terms-condition', [UserComonController::class, 'termsCondition']);

Route::prefix('hospital')->group(function () {
    Route::post("register", [UserController::class, 'register']);
    Route::post("login", [UserController::class, 'login']);
    Route::post("social-login", [UserController::class, 'socialLogin']);
    Route::post("social-register", [UserController::class, 'socialRegister']);
    Route::middleware('auth:api')->group(function () {
    Route::post("add-location", [UserController::class, 'addLocation']);

        Route::post("create-job", [HospitalJobController::class, 'createJob']);
        Route::post("update-job/{job_id}", [HospitalJobController::class, 'updateJob']);
        Route::get("remove-job/{job_id}", [HospitalJobController::class, 'removeJob']);
        Route::get("total-job-list", [HospitalJobController::class, 'totalJobList']);
        Route::get("recent-job-list", [HospitalJobController::class, 'recentJobList']);
        Route::get("job-view/{job_id}", [HospitalJobController::class, 'jobView']);
        Route::get("application-details/{id}", [HospitalJobController::class, 'applicationDetails']);
        Route::get("application-list/{job_id?}", [HospitalJobController::class, 'applicationList']);
        Route::post("application-accept-reject", [HospitalJobController::class, 'jobApplicationAcceptReject']);
        Route::get("job-count-details", [HospitalJobController::class, 'jobCountDetails']);
        Route::post("payment", [HospitalJobController::class, 'payment']);
    });
});

Route::prefix('nurse')->group(function () {
    Route::post("register", [NurseUserController::class, 'register']);
    Route::post("login", [NurseUserController::class, 'login']);
    Route::post("social-login", [NurseUserController::class, 'socialLogin']);
    Route::post("social-register", [NurseUserController::class, 'socialRegister']);
    Route::middleware('auth:api')->group(function () {
        Route::get("hospital-list", [NurseJobController::class, 'hospitalList']);
        Route::get("job-list/{hospital_id?}", [NurseJobController::class, 'jobList']);
        Route::post("apply-job", [NurseJobController::class, 'applyJob']);
        Route::post("job-confirmation", [NurseJobController::class, 'jobConfirmation']);
        Route::get("active-job", [NurseJobController::class, 'activejob']);
        Route::match(['get', 'post'], "recent-posted-job", [NurseJobController::class, 'recentPostedjob']);
        Route::get("ongoing-job", [NurseJobController::class, 'ongoingjob']);
        Route::get("complete-job", [NurseJobController::class, 'completejob']);
        Route::get("application-details/{id}", [NurseJobController::class, 'applicationDetails']);
        Route::get("nearest-hospital", [NurseJobController::class, 'nearestHospital']);

        Route::get("nurse-user-details", [NurseUserController::class, "nurseUserDetails"]);

        Route::get("upcoming-job", [NurseJobController::class, 'upcomingjob']);
        //skill
        Route::get('skill-list', [NurseJobController::class, 'skillList']);
        Route::post('skill-add', [NurseJobController::class, 'skillAdd']);
        //language
        Route::get('language-list', [NurseJobController::class, 'languageList']);
        Route::post('language-add', [NurseJobController::class, 'languageAdd']);

        //bank account add
        Route::post('add-edit-account', [NursePaymentController::class, 'addEditAccount']);
        Route::get('account-details', [NursePaymentController::class, 'accountDetails']);

        //edit profile
        Route::post('edit-profile', [NurseUserController::class, 'editProfile']);
        Route::post('nurse-change-password', [NurseUserController::class, 'nurseChangePassword']);

        Route::post('start-job/{application_id}', [NurseJobController::class, 'startJob']);
        Route::post('end-job/{application_id}', [NurseJobController::class, 'endJob']);
    });
});


// sanctum auth middleware routes   
Route::middleware('auth:api')->group(function () {
    Route::get("user", [UserController::class, "user"]);
    Route::post("change-password", [UserComonController::class, 'changePassword']);
    Route::get("notifications", [UserComonController::class, 'userNotificationList']);
    Route::post("delete-notification", [UserComonController::class, 'deleteNotification']);
    Route::post("read-notification", [UserComonController::class, 'readNotification']);


    //experience
    Route::get('experience-list', [UserComonController::class, 'experienceList']);

    //shift-timing
    Route::get('shift-timing-list', [UserComonController::class, 'shiftTimingList']);

    //nurse type
    Route::get('nurse-type-list', [UserComonController::class, 'nurseTypeList']);

    //other
    Route::resource('tasks', TaskController::class);  //patch/put   =>  x-www-form-urlencode
    Route::prefix('hospital')->group(function () {
        Route::post("address-details", [UserController::class, 'addressDetails']);
    });
});
