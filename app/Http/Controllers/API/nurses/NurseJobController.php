<?php

namespace App\Http\Controllers\API\nurses;

use App\Models\Jobs;
use App\Models\User;
use App\Models\Skills;
use App\Models\NurseSkills;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\NurseLanguages;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

/**
 * @group  Nurse Jobs
 *
 * APIs for managing basic job functionality
 */


class NurseJobController extends Controller
{
    /** 
     @authenticated
     * @response  {
    "status": true,
    "message": "",   
    "data": [
        {
            "id": 3,
            "first_name": "Columbus",
            "last_name": "Medhurst",
            "company_name": null,
            "email": "jerrod51@example.net",
            "username": null,
            "phone": "+18585968930",
            "address": null,
            "email_verified_at": "2022-03-01T07:05:57.000000Z",
            "social_id": null,
            "social_account_type": null,
            "profile_photo_path": null,
            "refer_code": null,
            "referrer_id": null,
            "country_id": null,
            "state_id": null,
            "state_name": null,
            "city_id": null,
            "city_name": null,
            "zipcode": null,
            "experience_year": null,
            "experience_month": null,
            "experience": null,
            "gender": null,
            "salary": null,
            "resume_path": null,
            "date_of_birth": null,
            "licence_number": null,
            "lpn": null,
            "can": null,
            "security_question": null,
            "security_answer": null,
            "otp": null,
            "otp_verified_at": null,
            "is_online": 0,
            "is_online_approve": 0,
            "is_enable_location": 0,
            "is_free": 1,
            "last_latitude": null,
            "last_longitude": null,
            "industry_id": null,
            "active": 0,
            "device_token": null,
            "wallet_balance": 0,
            "stripe_customer_id": null,
            "terms_and_condiction_1": "0",
            "terms_and_condiction_2": "0",
            "terms_and_condiction_3": "0",
            "created_at": "2022-03-01T07:05:57.000000Z",
            "updated_at": "2022-03-01T07:05:57.000000Z",
            "stripe_id": null,
            "pm_type": null,
            "pm_last_four": null,
            "trial_ends_at": null,
            "full_name": "Columbus Medhurst",
            "role_name": "HOSPITAL",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Columbus&color=7F9CF5&background=EBF4FF"
        }
    ]
}
     */
    public function hospitalList(Request $request)
    {
        try {
            $hospitals = User::role('HOSPITAL')->orderBy('id', 'DESC')->get();
            return response()->json(["status" => true,  "message" => '', "data" => $hospitals]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }



    /** 
     @authenticated
     * @response {
    "status": true,
    "message": "",
    "data": [
        {
            "id": 11,
            "nurse_id": null,
            "hospital_id": 5,
            "additional_instructions": null,
            "hospital_name": "abc hospital",
            "employee_required": "1",
            "licence_type": 1,
            "skills": "nursing",
            "shifting_timings": null,
            "hiring_budget": "30000",
            "hospital_phone": "9876543210",
            "experience": "1 year",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": null,
            "hospital_state_id": null,
            "hospital_city_id": null,
            "hospital_zipcode": "700001",
            "job_post_date": null,
            "promo_code": null,
            "discount_amount": 0,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 0,
            "nurse_status": null,
            "job_status": 1,
            "terms_and_conditions": 1,
            "payment_status": 2,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 0,
            "created_at": "2022-03-24T06:50:29.000000Z",
            "updated_at": "2022-03-24T07:01:01.000000Z",
            "apply": false,
            "job_shifting": [
                {
                    "id": 1,
                    "job_id": 11,
                    "shifting_time": "10:00AM - 03:00PM",
                    "start_time": "10:00:00",
                    "end_time": "15:00:00",
                    "status": null,
                    "created_at": "2022-03-24T06:50:29.000000Z",
                    "updated_at": "2022-03-24T06:50:29.000000Z"
                },
                {
                    "id": 2,
                    "job_id": 11,
                    "shifting_time": "11:00AM - 04:00PM",
                    "start_time": "11:00:00",
                    "end_time": "16:00:00",
                    "status": null,
                    "created_at": "2022-03-24T06:50:29.000000Z",
                    "updated_at": "2022-03-24T06:50:29.000000Z"
                }
            ]
        }
    ]
}
     */
    public function jobList(Request $request, $id = '')
    {
        try {
            $jobs = Jobs::query();

            if (!empty($id) || $id != '') {
                $jobs = $jobs->where('hospital_id', $id);
            }

            $jobs = $jobs->with('jobShifting')->orderBy('id', 'DESC')->paginate(20);
            $jobs =  $jobs->each(function ($iteam) {
                $get_jobApplication = JobApplication::where('user_id', auth()->user()->id)->where('job_id', $iteam->id)->first();

                $iteam->apply = false;
                if ($get_jobApplication) {
                    $iteam->apply = true;
                }
            });
            if ($jobs->count()) {
                return response()->json(["status" => true,  "message" => '', "data" => $jobs]);
            } else {
                return response()->json(["status" => false,  "message" => 'No data found', "data" => $jobs]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /** 
     @authenticated
     * @bodyParam job_id string required Example: 1
     * @bodyParam shifting_id string required Example: 1

     * @response {
    "status": true,
    "message": "Your application successfully submitted.",
    "data": []
}
     */
    public function applyJob(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "shifting_id" =>  "required",
                "job_id" =>  "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $get_jobApplication = JobApplication::where('user_id', auth()->user()->id)->where('job_id', $request->job_id)->first();

            if ($get_jobApplication) {
                return response()->json(["status" => false, "message" => 'Already applied.']);
            }


            $user = auth()->user();


            $profile_pic = isset($user->profile_photo_path) ? url('/') . "/storage/" . $user->profile_photo_path : null;

            //dd($profile_pic);
            $apply_job = new JobApplication;
            $apply_job->job_id = $request->job_id;
            $apply_job->job_shifting_id = $request->shifting_id;
            $apply_job->user_id = auth()->user()->id;
            $apply_job->is_applied = 1;
            $apply_job->save();


            $get_job = Jobs::find($request->job_id);
            // $notifyDetails["type"] = 'New Application';
            // $notifyDetails["title"] = auth()->user()->full_name;
            // $notifyDetails["image"] = $profile_pic;
            // $notifyDetails["body"] = 'You have a new application';
            // $notifyDetails["application_id"] = $apply_job->id;
            // $notifyDetails["nurse_id"] = auth()->user()->id;
            // $notify_user = User::find($get_job->hospital_id);
            // Notification::send($notify_user, new UserNotification($notifyDetails));

            return response()->json(["status" => true,  "message" => 'Your application successfully submitted.', "data" => []]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }


    /** 
     @authenticated
     * @bodyParam comment string required Example: test comment
     * @bodyParam license image required
     * @bodyParam application_id string required Example: 1

     * @response {
    "status": true,
    "message": "Successfully confirmed.",
    "data": {
        "id": 1,
        "user_id": 5,
        "job_id": 1,
        "comment": "job comfirm",
        "license": "1646638964-4443.png",
        "status": null,
        "created_at": "2022-03-02T14:15:34.000000Z",
        "updated_at": "2022-03-07T07:42:44.000000Z",
        "license_path": "http://127.0.0.1:8000/storage/license/1646638964-4443.png"
    }
}
     */
    public function jobConfirmation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "comment" =>  "required",
                "license" =>  "required",
                "application_id" =>  "required",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $get_jobApplication = JobApplication::where('user_id', auth()->user()->id)->where('id', $request->application_id)->first();

            if ($get_jobApplication->license != null || $get_jobApplication->comment != null) {
                return response()->json(["status" => false, "message" => 'You have already confirmed the job.']);
            }

            if (!$get_jobApplication) {
                return response()->json(["status" => false, "message" => 'Application not found.']);
            }
            $get_jobApplication->comment = $request->comment;

            if ($request->hasFile('license')) {
                $filename = time() . '-' . rand(1000, 9999) . '.' . $request->license->extension();
                $request->file('license')->storeAs('public/license/', $filename);
                $get_jobApplication->license = $filename;
            }
            $get_jobApplication->save();


            $get_job = Jobs::find($get_jobApplication->job_id);
            $notifyDetails["type"] = 'Job Confirm';
            $notifyDetails["title"] = auth()->user()->full_name;
            $notifyDetails["image"] = auth()->user()->profile_photo_url;
            $notifyDetails["body"] = auth()->user()->full_name . ' Confirm The Job';
            $notifyDetails["application_id"] = $get_jobApplication->id;
            $notifyDetails["nurse_id"] = auth()->user()->id;
            $notify_user = User::find($get_job->hospital_id);
            Notification::send($notify_user, new UserNotification($notifyDetails));
            return response()->json(["status" => true,  "message" => 'Successfully confirmed.', "data" => $get_jobApplication]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /**
     * Active Job
     * @authenticated
     * @response {
    "status": true,
    "message": "Your active jobs",
    "data": [
        {
            "id": 2,
            "user_id": 7,
            "job_id": 1,
            "comment": null,
            "license": null,
            "status": 1,
            "approve_time": null,
            "created_at": "2022-03-22T06:51:00.000000Z",
            "updated_at": "2022-03-04T11:08:16.000000Z",
            "license_path": "",
            "job": {
                "id": 1,
                "nurse_id": null,
                "hospital_id": 5,
                "additional_instructions": null,
                "hospital_name": "abc hospital",
                "employee_required": "10",
                "licence_type": 1,
                "skills": "nursing",
                "shifting_timings": "day",
                "hiring_budget": "30000",
                "hospital_phone": "9876543210",
                "experience": "1 year",
                "urgent_requirement": 1,
                "hospital_location": "kolkata",
                "hospital_latitude": null,
                "hospital_longitude": null,
                "hospital_country_id": null,
                "hospital_state_id": null,
                "hospital_city_id": null,
                "hospital_zipcode": "700001",
                "job_post_date": null,
                "promo_code": null,
                "discount_amount": 0,
                "reward_discount_amount": 0,
                "cancellation_charge": 0,
                "total_amount": 0,
                "nurse_status": null,
                "job_status": 1,
                "terms_and_conditions": 1,
                "payment_status": 2,
                "cancelled_by": null,
                "cancellation_reason": null,
                "cancellation_comment": null,
                "cancelled_at": null,
                "active": 0,
                "created_at": "2022-02-17T12:11:40.000000Z",
                "updated_at": "2022-03-07T14:40:11.000000Z",
                "job_shifting": [
                    {
                        "id": 1,
                        "job_id": 1,
                        "shifting_time": "10:00AM - 03:00PM",
                        "start_time": "10:00:00",
                        "end_time": "15:00:00",
                        "status": null,
                        "created_at": "2022-03-24T06:50:29.000000Z",
                        "updated_at": "2022-03-24T06:50:29.000000Z"
                    },
                    {
                        "id": 2,
                        "job_id": 1,
                        "shifting_time": "11:00AM - 04:00PM",
                        "start_time": "11:00:00",
                        "end_time": "16:00:00",
                        "status": null,
                        "created_at": "2022-03-24T06:50:29.000000Z",
                        "updated_at": "2022-03-24T06:50:29.000000Z"
                    }
                ]
            }
        }
    ]
}
     */

    public function activejob()
    {
        try {
            $userid = auth()->user()->id;
            $jobs = JobApplication::with('job', 'job.jobShifting', 'nurse', 'job.nursetype', 'selectShiftingTime')->where('user_id', $userid)->where('status', 1)->get();
            if ($jobs) {
                return response()->json(["status" => true,  "message" => 'Your active jobs', "data" => $jobs]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any active job']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /**
     * Recent posted job
     * @authenticated
     * @urlParam hospital_name string Example: abc
     * @urlParam nurse_type string Example: lpn
   
     * @response {
    "status": true,
    "message": "Recent posted job",
    "data": [
        
        {
            "id": 1,
            "nurse_id": null,
            "hospital_id": 2,
            "additional_instructions": null,
            "hospital_name": "test",
            "employee_required": "1",
            "licence_type": 1,
            "skills": "1",
            "shifting_timings": "1",
            "hiring_budget": "1",
            "hospital_phone": "123456789",
            "experience": "1",
            "urgent_requirement": 1,
            "hospital_location": "1",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": null,
            "hospital_state_id": null,
            "hospital_city_id": null,
            "hospital_zipcode": "12345",
            "job_post_date": null,
            "promo_code": null,
            "discount_amount": 0,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 0,
            "nurse_status": null,
            "job_status": 1,
            "terms_and_conditions": 1,
            "payment_status": 1,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 0,
            "created_at": "2022-03-21T13:09:30.000000Z",
            "updated_at": "2022-03-21T13:09:30.000000Z",
            "hospital": {
                "id": 2,
                "first_name": "hospital",
                "last_name": "user",
                "company_name": null,
                "email": "user@gmail.com",
                "username": "user",
                "phone": "12345678",
                "address": null,
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": null,
                "experience_id": null,
                "language_id": null,
                "skill_id": null,
                "cover_photo_path": null,
                "refer_code": null,
                "referrer_id": null,
                "country_id": null,
                "country_name": null,
                "state_id": null,
                "state_name": null,
                "city_id": null,
                "city_name": null,
                "zipcode": null,
                "experience_year": null,
                "experience_month": null,
                "experience": null,
                "gender": null,
                "salary": null,
                "resume_path": null,
                "date_of_birth": null,
                "licence_number": null,
                "lpn": null,
                "can": null,
                "security_question": null,
                "security_answer": null,
                "licence_type": null,
                "otp": null,
                "otp_verified_at": null,
                "is_online": 0,
                "is_online_approve": 0,
                "is_enable_location": 0,
                "is_free": 1,
                "last_latitude": null,
                "last_longitude": null,
                "industry_id": null,
                "active": 0,
                "device_token": null,
                "wallet_balance": 0,
                "stripe_customer_id": null,
                "terms_and_condiction_1": "0",
                "terms_and_condiction_2": "0",
                "terms_and_condiction_3": "0",
                "created_at": "2022-03-21T13:03:54.000000Z",
                "updated_at": "2022-03-21T13:03:54.000000Z",
                "stripe_id": null,
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "full_name": "hospital user",
                "role_name": "HOSPITAL",
                "profile_photo_url": "https://ui-avatars.com/api/?name=hospital&color=7F9CF5&background=EBF4FF",
                "cover_photo_url": "",
                "resume_url": ""
            },
            "nursetype": {
                "id": 1,
                "type_name": "CAN",
                "active": 1,
                "created_at": null,
                "updated_at": null
            },
            "job_application": [
                {
                    "id": 1,
                    "user_id": 3,
                    "job_id": 1,
                    "comment": null,
                    "license": null,
                    "status": null,
                    "is_applied": 1,
                    "created_at": "2022-03-21T13:10:14.000000Z",
                    "updated_at": "2022-03-21T13:10:14.000000Z",
                    "license_path": ""
                }
            ]
        }
    ],
    "job": null
}
     */

    public function recentPostedjob(Request $request)
    {
        try {
            $recent_jobs = Jobs::with('hospital', 'nursetype', 'jobApplication', 'jobShifting')->where('job_status', 1)->where('payment_status', 2)->where('nurse_id', null);
            if ($request->hospital_name) {
                $recent_jobs = $recent_jobs->where('hospital_name', 'like', '%' . $request->hospital_name . '%');
            }
            if ($request->nurse_type) {
                $recent_jobs = $recent_jobs->whereHas('nursetype', function ($query) use ($request) {
                    $query->where('type_name', $request->nurse_type);
                });
            }
            $recent_jobs = $recent_jobs->orderBy('id', 'DESC')->get();


            if ($recent_jobs) {
                return response()->json(["status" => true,  "message" => 'Recent posted job', "data" => $recent_jobs]);
            } else {
                return response()->json(["status" => false,  "message" => 'No job is posted recenty']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /**
     * Complete Job
     * @authenticated
     * @response {
    "status": true,
    "message": "Your active jobs",
    "data": [
        {
            "id": 1,
            "user_id": 2,
            "job_id": 1,
            "comment": test comment,
            "license": samplelicense.pdf,
            "status": 1,
            "created_at": "2022-03-09T13:26:19.000000Z",
            "updated_at": "2022-03-09T13:26:19.000000Z",
            "license_path": "",
            "job": {
                "id": 1,
                "nurse_id": 2,
                "hospital_id": 3,
                "additional_instructions": "asdasd",
                "hospital_name": "hospital one",
                "employee_required": "3",
                "licence_type": 2,
                "skills": "adasd,sdfsdf",
                "shifting_timings": null,
                "hiring_budget": "4555",
                "hospital_phone": "4567890876",
                "experience": "4",
                "urgent_requirement": 1,
                "hospital_location": "kolkata",
                "hospital_latitude": null,
                "hospital_longitude": null,
                "hospital_country_id": 16,
                "hospital_state_id": 19,
                "hospital_city_id": 1,
                "hospital_zipcode": "700035",
                "job_post_date": "2022-03-09 13:24:00",
                "promo_code": "45",
                "discount_amount": 45,
                "reward_discount_amount": 0,
                "cancellation_charge": 0,
                "total_amount": 5000,
                "nurse_status": null,
                "job_status": 1,
                "terms_and_conditions": null,
                "payment_status": 1,
                "cancelled_by": null,
                "cancellation_reason": null,
                "cancellation_comment": null,
                "cancelled_at": null,
                "active": 1,
                "created_at": "2022-03-09T13:24:00.000000Z",
                "updated_at": "2022-03-09T13:24:00.000000Z"
            }
        }
    ]
}
     */

    public function completejob()
    {
        try {
            $userid = auth()->user()->id;
            $complete_jobs = JobApplication::with('job', 'job.nursetype', 'job.hospital')->where('user_id', $userid)->where('license', '!=', null)->get();
            if ($complete_jobs) {
                return response()->json(["status" => true,  "message" => 'Your complete jobs', "data" => $complete_jobs]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any complete job']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /**
     * Nurse skill list
     * @authenticated
     * @response {
    "status": true,
    "message": "Your skill list",
    "data": [
        {
            "id": 1,
            "skill_id": 1,
            "skill_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T11:19:37.000000Z",
            "updated_at": "2022-03-10T11:19:37.000000Z",
            "skills": {
                "id": 1,
                "skill_name": "Test1",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        },
        {
            "id": 2,
            "skill_id": 2,
            "skill_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T11:19:37.000000Z",
            "updated_at": "2022-03-10T11:19:37.000000Z",
            "skills": {
                "id": 2,
                "skill_name": "Test2",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}
     */

    public function skillList()
    {
        try {
            $userid = auth()->user()->id;
            $skills = NurseSkills::with('skills')->where('user_id', $userid)->get();
            if ($skills) {
                return response()->json(["status" => true,  "message" => 'Your skill list', "data" => $skills]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any skill']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again']);
        }
    }

    /**
     * Nurse's skill add
     * @auhenticated
     * @bodyParam skill_id array required 
     * @response {
    "status": true,
    "message": "Skill added successfully"
}
     */

    public function skillAdd(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                "skill_id" =>  "required|array",
                "skill_id.*" =>  "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }
            $userid = auth()->user()->id;
            for ($i = 0; $i < count($request->skill_id); $i++) {
                $countkill = NurseSkills::where('user_id', $userid)->where('skill_id', $request->skill_id[$i])->count();
                if ($countkill == 0) {
                    $nurse_skill = new NurseSkills;
                    $nurse_skill->skill_id = $request->skill_id[$i];
                    $nurse_skill->user_id = $userid;
                    $nurse_skill->save();
                }
            }
            return response()->json(["status" => true,  "message" => 'Skill added successfully']);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

    /**
     * Nurse language list
     * @authenticated
     * @response {
    "status": true,
    "message": "Your language list",
    "data": [
        {
            "id": 1,
            "language_id": 1,
            "language_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T13:21:57.000000Z",
            "updated_at": "2022-03-10T13:21:57.000000Z",
            "languages": {
                "id": 1,
                "language_name": "English",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        },
        {
            "id": 2,
            "language_id": 2,
            "language_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T13:21:57.000000Z",
            "updated_at": "2022-03-10T13:21:57.000000Z",
            "languages": {
                "id": 2,
                "language_name": "German",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}
     */
    public function languageList()
    {
        try {
            $userid = auth()->user()->id;
            $languages = NurseLanguages::with('languages')->where('user_id', $userid)->get();
            if ($languages) {
                return response()->json(["status" => true,  "message" => 'Your language list', "data" => $languages]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any language']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

    /**
     * Nurse's language add
     * @authenticated
     * @bodyParam language_id array required 
     * @response {
    "status": true,
    "message": "Language added successfully"
}
     */

    public function languageAdd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "language_id" =>  "required|array",
                "language_id.*" =>  "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }
            $userid = auth()->user()->id;
            for ($i = 0; $i < count($request->language_id); $i++) {
                $countlang = NurseLanguages::where('user_id', $userid)->where('language_id', $request->language_id[$i])->count();
                if ($countlang == 0) {
                    $nurse_lang = new NurseLanguages;
                    $nurse_lang->language_id = $request->language_id[$i];
                    $nurse_lang->user_id = $userid;
                    $nurse_lang->save();
                }
            }
            return response()->json(["status" => true,  "message" => 'Language added successfully']);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

    /**
     * Upcoming Jobs
     * @authenticated
     * @response {
    "status": true,
    "message": "Upcoming job",
    "data": [
        {
            "id": 3,
            "nurse_id": null,
            "hospital_id": 3,
            "additional_instructions": "asdasd",
            "hospital_name": "hospital three",
            "employee_required": "3",
            "licence_type": 2,
            "skills": "adasd,sdfsdf",
            "shifting_timings": null,
            "hiring_budget": "4555",
            "hospital_phone": "4567890876",
            "experience": "4",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": 16,
            "hospital_state_id": 19,
            "hospital_city_id": 1,
            "hospital_zipcode": "700035",
            "job_post_date": "2022-03-09 13:24:00",
            "promo_code": "45",
            "discount_amount": 45,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 5000,
            "nurse_status": null,
            "job_status": 2,
            "terms_and_conditions": null,
            "payment_status": 1,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 1,
            "created_at": "2022-03-09T13:24:00.000000Z",
            "updated_at": "2022-03-09T13:24:00.000000Z",
            "hospital": {
                "id": 3,
                "first_name": "new",
                "last_name": "hosital",
                "company_name": null,
                "email": "new@yopmail.com",
                "username": null,
                "phone": "6756453423",
                "address": "<p>qweqweqweqwe</p>\n",
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": "photos/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg",
                "refer_code": null,
                "referrer_id": null,
                "country_id": 29,
                "state_id": 19,
                "state_name": null,
                "city_id": 1,
                "city_name": null,
                "zipcode": null,
                "experience_year": null,
                "experience_month": null,
                "experience": null,
                "gender": null,
                "salary": null,
                "resume_path": null,
                "date_of_birth": null,
                "licence_number": null,
                "lpn": null,
                "can": null,
                "security_question": null,
                "security_answer": null,
                "licence_type": null,
                "otp": null,
                "otp_verified_at": null,
                "is_online": 0,
                "is_online_approve": 0,
                "is_enable_location": 0,
                "is_free": 1,
                "last_latitude": null,
                "last_longitude": null,
                "industry_id": null,
                "active": 1,
                "device_token": null,   
                "wallet_balance": 0,
                "stripe_customer_id": null,
                "terms_and_condiction_1": "0",
                "terms_and_condiction_2": "0",
                "terms_and_condiction_3": "0",   
                "created_at": "2022-03-09T13:22:19.000000Z",  
                "updated_at": "2022-03-09T13:22:19.000000Z",
                "stripe_id": null,  
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "experience_id": null,
                "cover_photo_path": null,
                "full_name": "new hosital",
                "role_name": "HOSPITAL",
                "profile_photo_url": "http://localhost/storage/photos/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg"
            }
        },
        {
            "id": 2,
            "nurse_id": null,
            "hospital_id": 3,
            "additional_instructions": "asdasd",
            "hospital_name": "hospital two",
            "employee_required": "3",
            "licence_type": 2,
            "skills": "adasd,sdfsdf",
            "shifting_timings": null,
            "hiring_budget": "4555",
            "hospital_phone": "4567890876",
            "experience": "4",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": 16,
            "hospital_state_id": 19,
            "hospital_city_id": 1,
            "hospital_zipcode": "700035",
            "job_post_date": "2022-03-09 13:24:00",
            "promo_code": "45",
            "discount_amount": 45,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 5000,
            "nurse_status": null,
            "job_status": 2,
            "terms_and_conditions": null,
            "payment_status": 1,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 1,
            "created_at": "2022-03-09T13:24:00.000000Z",
            "updated_at": "2022-03-09T13:24:00.000000Z",
            "hospital": {
                "id": 3,
                "first_name": "new",
                "last_name": "hosital",
                "company_name": null,
                "email": "new@yopmail.com",
                "username": null,
                "phone": "6756453423",
                "address": "<p>qweqweqweqwe</p>\n",
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": "photos/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg",
                "refer_code": null,
                "referrer_id": null,
                "country_id": 29,
                "state_id": 19,
                "state_name": null,
                "city_id": 1,
                "city_name": null,
                "zipcode": null,
                "experience_year": null,
                "experience_month": null,
                "experience": null,
                "gender": null,
                "salary": null,
                "resume_path": null,
                "date_of_birth": null,
                "licence_number": null,
                "lpn": null,
                "can": null,
                "security_question": null,
                "security_answer": null,
                "licence_type": null,
                "otp": null,
                "otp_verified_at": null,
                "is_online": 0,
                "is_online_approve": 0,
                "is_enable_location": 0,
                "is_free": 1,
                "last_latitude": null,
                "last_longitude": null,
                "industry_id": null,
                "active": 1,
                "device_token": null,
                "wallet_balance": 0,
                "stripe_customer_id": null,
                "terms_and_condiction_1": "0",
                "terms_and_condiction_2": "0",
                "terms_and_condiction_3": "0",
                "created_at": "2022-03-09T13:22:19.000000Z",
                "updated_at": "2022-03-09T13:22:19.000000Z",
                "stripe_id": null,
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "experience_id": null,
                "cover_photo_path": null,
                "full_name": "new hosital",
                "role_name": "HOSPITAL",
                "profile_photo_url": "http://localhost/storage/photos/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg"
            }
        }
    ]
}
     */

    public function upcomingjob()
    {
        try {
            $upcoming_jobs = Jobs::with('hospital')->where('job_status', 2)->where('nurse_id', null)->orderBy('id', 'DESC')->get();
            if ($upcoming_jobs) {
                return response()->json(["status" => true,  "message" => 'Upcoming job', "data" => $upcoming_jobs]);
            } else {
                return response()->json(["status" => false,  "message" => 'No job is posted recenty']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /** 
     @authenticated
     * @response  {
    "status": true,
    "message": "",
    "data": {
        "id": 1,
        "user_id": 5,
        "job_id": 1,
        "comment": "job comfirm",
        "license": "1646638964-4443.png",
        "status": null,
        "created_at": "2022-03-02T14:15:34.000000Z",
        "updated_at": "2022-03-07T07:42:44.000000Z",
        "license_path": "http://127.0.0.1:8000/storage/license/1646638964-4443.png",
        "job": {
            "id": 1,
            "nurse_id": null,
            "hospital_id": 5,
            "additional_instructions": null,
            "hospital_name": "abc hospital",
            "employee_required": "10",
            "licence_type": 1,
            "skills": "nursing",
            "shifting_timings": "day",
            "hiring_budget": "30000",
            "hospital_phone": "9876543210",
            "experience": "1 year",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": null,
            "hospital_state_id": null,
            "hospital_city_id": null,
            "hospital_zipcode": "700001",
            "job_post_date": null,
            "promo_code": null,
            "discount_amount": 0,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 0,
            "nurse_status": null,
            "job_status": 1,
            "terms_and_conditions": 1,
            "payment_status": 2,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 0,
            "created_at": "2022-02-17T12:11:40.000000Z",
            "updated_at": "2022-03-07T14:40:11.000000Z",
            "hospital": {
                "id": 5,
                "first_name": "test",
                "last_name": "hospital",
                "company_name": null,
                "email": "dakoqet@vomoto.com",
                "username": "testhospital",
                "phone": "9876543211",
                "address": "JohnDoe",
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": null,
                "refer_code": null,
                "referrer_id": null,
                "country_id": 1,
                "state_id": null,
                "state_name": null,
                "city_id": 1,
                "city_name": null,
                "zipcode": "700001",
                "experience_year": null,
                "experience_month": null,
                "experience": null,
                "gender": null,
                "salary": null,
                "resume_path": null,
                "date_of_birth": null,
                "licence_number": null,
                "lpn": null,
                "can": null,
                "security_question": null,
                "security_answer": null,
                "otp": null,
                "otp_verified_at": null,
                "is_online": 0,
                "is_online_approve": 0,
                "is_enable_location": 0,
                "is_free": 1,
                "last_latitude": "22.89002",
                "last_longitude": "88.20123",
                "industry_id": null,
                "active": 0,
                "device_token": null,
                "wallet_balance": 0,
                "stripe_customer_id": null,
                "terms_and_condiction_1": "0",
                "terms_and_condiction_2": "0",
                "terms_and_condiction_3": "0",   
                "created_at": "2022-03-01T12:49:13.000000Z",
                "updated_at": "2022-03-04T06:12:56.000000Z",
                "stripe_id": null,
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "full_name": "test hospital",
                "role_name": "HOSPITAL",
                "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF"
            }
        }
    }
}
     */
    public function applicationDetails(Request $request, $id)
    {
        try {
            $application = JobApplication::with('job', 'job.hospital', 'job.nursetype', 'selectShiftingTime')->find($id);
            if ($application) {
                return response()->json(["status" => true,  "message" => '', "data" => $application]);
            } else {
                return response()->json(["status" => false,  "message" => 'No application found.', "data" => $application]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }


    /** 
     @authenticated
     * @response  {
    "status": true,
    "message": "",
    "data": [
        {
            "id": 5,
            "first_name": "test",
            "last_name": "hospital",
            "company_name": null,
            "email": "dakoqet@vomoto.com",
            "username": "testhospital",
            "phone": "9876543211",
            "address": "JohnDoe",
            "email_verified_at": null,
            "social_id": null,
            "social_account_type": null,
            "profile_photo_path": null,
            "refer_code": null,
            "referrer_id": null,
            "country_id": 1,
            "state_id": null,
            "state_name": null,
            "city_id": 1,
            "city_name": null,
            "zipcode": "700001",
            "experience_year": null,
            "experience_month": null,
            "experience": null,
            "gender": null,
            "salary": null,
            "resume_path": null,
            "date_of_birth": null,
            "licence_number": null,
            "lpn": null,
            "can": null,
            "security_question": null,
            "security_answer": null,
            "otp": null,
            "otp_verified_at": null,
            "is_online": 0,
            "is_online_approve": 0,
            "is_enable_location": 0,
            "is_free": 1,
            "last_latitude": "22.565571",
            "last_longitude": "88.370209",
            "industry_id": null,
            "active": 0,
            "device_token": null,
            "wallet_balance": 0,
            "stripe_customer_id": null,
            "terms_and_condiction_1": "0",
            "terms_and_condiction_2": "0",
            "terms_and_condiction_3": "0",
            "created_at": "2022-03-01T12:49:13.000000Z",
            "updated_at": "2022-03-04T06:12:56.000000Z",
            "stripe_id": null,
            "pm_type": null,
            "pm_last_four": null,
            "trial_ends_at": null,
            "distance": 0,
            "full_name": "test hospital",
            "role_name": "HOSPITAL",
            "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF"
        }
    ]
}
     */

    public function nearestHospital(Request $request)
    {
        try {
            $user = auth()->user();
            $latitude = $user->last_latitude;
            $longitude = $user->last_longitude;
            $redius = 10;
            $distance = $redius / 0.62137;

            if (!empty($distance) && !empty($latitude) && !empty($longitude)) {
                $sql_distance = " (((acos(sin((" . $latitude . "*pi()/180)) * sin((`users`.`last_latitude`*pi()/180))+cos((" . $latitude . "*pi()/180)) * cos((`users`.`last_latitude`*pi()/180)) * cos(((" . $longitude . "-`users`.`last_longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance ";
                $hospital =  User::select('users.*', DB::raw($sql_distance))
                    ->having('distance', '<=', $distance)
                    ->role('HOSPITAL')
                    ->orderBy('distance', 'ASC')
                    ->get();
            }
            if (isset($hospital) && $hospital->count()) {
                return response()->json(["status" => true,  "message" => '', "data" => $hospital]);
            } else {
                return response()->json(["status" => false,  "message" => 'No data found.', "data" => []]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /**
     * Nurse's start job
     * @authenticated
     * @response {
    "status": true,
    "message": "Job successfully started"
}
     */

    public function startJob(Request $request, $application_id)
    {
        try {
            $start_job = JobApplication::where('user_id', auth()->user()->id)->where('status', 2)->where('license', '!=', null)->where('start_job_time', '!=', null)->where('end_job_time', null)->orderBy('id', 'DESC')->first();

            if ($start_job) {
                return response()->json(["status" => false,  "message" => 'One job is already started. Before starting please end the previous job.']);
            }

            $application = JobApplication::find($application_id);
            if ($application->status != 2) {
                return response()->json(["status" => false,  "message" => 'This job was not approved by the hospital.']);
            }
            if ($application->start_job_time != null) {
                return response()->json(["status" => false,  "message" => 'Job already started.']);
            }

            $application->start_job_time = now();
            $application->save();

            return response()->json(["status" => true,  "message" => 'Job successfully started']);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

    /**
     * Nurse's end job
     * @authenticated
     * @response {
    "status": true,
    "message": "Job successfully ended"
}
     */

    public function endJob(Request $request, $application_id)
    {
        try {
            $application = JobApplication::find($application_id);
            if ($application->end_job_time != null) {
                return response()->json(["status" => false,  "message" => 'Job already ended.']);
            }
            $application->end_job_time = now();
            $application->save();

            return response()->json(["status" => true,  "message" => 'Job successfully ended']);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }


    /**
     * Nurse's ongoing job
     * @authenticated
     * @response {
    "status": true,
    "message": "",
    "data": {
        "id": 1,
        "user_id": 7,
        "job_id": 1,
        "job_shifting_id": null,
        "comment": "job comfirm",
        "license": "1646638964-4443.png",
        "start_job_time": "2022-03-25 14:07:57",
        "end_job_time": null,
        "status": 2,
        "approve_time": null,
        "created_at": "2022-03-02T14:15:34.000000Z",
        "updated_at": "2022-03-07T07:42:44.000000Z",
        "license_path": "http://127.0.0.1:8000/storage/license/1646638964-4443.png",
        "job": {
            "id": 1,
            "nurse_id": null,
            "hospital_id": 5,
            "additional_instructions": null,
            "hospital_name": "abc hospital",
            "employee_required": "10",
            "licence_type": 1,
            "skills": "nursing",
            "shifting_timings": "day",
            "hiring_budget": "30000",
            "hospital_phone": "9876543210",
            "experience": "1 year",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": null,
            "hospital_state_id": null,
            "hospital_city_id": null,
            "hospital_zipcode": "700001",
            "job_post_date": null,
            "promo_code": null,
            "discount_amount": 0,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 0,
            "nurse_status": null,
            "job_status": 1,
            "terms_and_conditions": 1,
            "payment_status": 2,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 0,
            "created_at": "2022-02-17T12:11:40.000000Z",
            "updated_at": "2022-03-07T14:40:11.000000Z"
        },
        "select_shifting_time": {
            "id": null,
            "time_duration": "0:00"
        },
        "nurse": {
            "id": 7,
            "first_name": "test nurse",
            "last_name": null,
            "company_name": null,
            "email": "tajuzol@tafmail.com",
            "username": "testnurse",
            "phone": "9876543212",
            "address": "kolkata-700001",
            "email_verified_at": null,
            "social_id": null,
            "social_account_type": null,
            "profile_photo_path": "1646287708-3424.jpg",
            "refer_code": null,
            "referrer_id": null,
            "country_id": 1,
            "state_id": null,
            "state_name": null,
            "city_id": 1,
            "city_name": null,
            "zipcode": "700001",
            "experience_year": "3",
            "experience_month": "7",
            "experience": null,
            "gender": null,
            "salary": null,
            "resume_path": null,
            "date_of_birth": null,
            "licence_number": null,
            "lpn": null,
            "can": null,
            "security_question": null,
            "security_answer": null,
            "otp": null,
            "otp_verified_at": null,
            "is_online": 0,
            "is_online_approve": 0,
            "is_enable_location": 0,
            "is_free": 1,
            "last_latitude": "22.565571",
            "last_longitude": "88.370209",
            "industry_id": null,
            "active": 0,
            "device_token": null,
            "wallet_balance": 0,
            "stripe_customer_id": null,
            "terms_and_condiction_1": "0",
            "terms_and_condiction_2": "0",
            "terms_and_condiction_3": "0",
            "created_at": "2022-03-03T06:08:28.000000Z",
            "updated_at": "2022-03-03T06:08:28.000000Z",
            "stripe_id": null,
            "pm_type": null,
            "pm_last_four": null,
            "trial_ends_at": null,
            "full_name": "test nurse ",
            "role_name": "NURSE",
            "profile_photo_url": "http://localhost/storage/1646287708-3424.jpg",
            "cover_photo_url": "",
            "resume_url": ""
        }
    }
}
     */

    public function ongoingJob(Request $request)
    {
        try {
            $job = JobApplication::with('job', 'selectShiftingTime', 'nurse', 'job.nursetype')->where('user_id', auth()->user()->id)->where('status', 2)->where('license', '!=', null)->where('start_job_time', '!=', null)->where('end_job_time', null)->orderBy('id', 'DESC')->first();

            if ($job) {
                return response()->json(["status" => true,  "message" => '', "data" => $job]);
            } else {
                return response()->json(["status" => false,  "message" => 'No job found.']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }
}
