<?php

namespace App\Http\Controllers\API\hospital;

use Stripe\Stripe;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\JobShifting;
use App\Models\PaymentDetails;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;


/**
 * @group  Hospital Jobs
 *
 * APIs for managing basic job functionality
 */


class HospitalJobController extends Controller
{
    /** 
     @authenticated
     * 
     * @bodyParam hospital_name string required Example: abc hospital
     * @bodyParam employee_required string required Example: 10
     * @bodyParam licence_type string required Example: 1|2
     * @bodyParam skills string required Example: nursing
     * @bodyParam hiring_budget string required Example: 30000
     * @bodyParam hospital_phone string required Example: 9876543210
     * @bodyParam experience string required Example: 1 year
     * @bodyParam urgent_requirement string required Example: 1|0
     * @bodyParam hospital_location string required Example: kolkata
     * @bodyParam hospital_zipcode string required Example: 700001
     * @bodyParam shifting_timings string required Example: day
     * @bodyParam terms_and_conditions string required Example: 1|0
     * @response  {
    "status": true,
    "message": "Complete the payment and post the job.",
    "data": {
        "job_id": 9,
        "total": "100",
        "taxTotal": 5,
        "subTotal": 105
    }
}
     */


    public function createJob(Request $request)
    {
        $rules = [
            'hospital_name' => ['required'],
            // 'employee_required' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
            'licence_type' => ['required'],
            'skills' => ['required'],
            'hiring_budget' => ['required'],
            'hospital_phone' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:8', 'max:13'],
            'experience' => ['required'],
            'urgent_requirement' => ['required'],
            'hospital_location' => ['required'],
            'hospital_zipcode' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:5', 'max:10'],
            'shifting_timings' => ['required'],
            'terms_and_conditions' => ['required'],
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(["status" => false, "message"  => $validator->errors()->first()]);
        }

        try {
            $job = new Jobs;
            $job->hospital_name = $request->hospital_name;
            $job->employee_required = $request->employee_required ?? 1;
            $job->licence_type = $request->licence_type;
            $job->skills = $request->skills;
            $job->hiring_budget = $request->hiring_budget;
            $job->hospital_phone = $request->hospital_phone;
            $job->experience = $request->experience;
            $job->urgent_requirement = $request->urgent_requirement;
            $job->hospital_location = $request->hospital_location;
            $job->hospital_zipcode = $request->hospital_zipcode;


            $job->terms_and_conditions = $request->terms_and_conditions;
            $job->hospital_id = auth()->user()->id;
            $job->save();

            if (!empty($request->shifting_timings)) {
                // return $request->shifting_timings;
                foreach ($request->shifting_timings as $timing) {

                    $job_shifting = new JobShifting();
                    $job_shifting->job_id = $job->id;
                    $job_shifting->shifting_time = $timing['time'];
                    $s_time = explode('-', $timing['time']);
                    $job_shifting->start_time = date('H:i:s', strtotime($s_time[0]));
                    $job_shifting->end_time = date('H:i:s', strtotime(trim($s_time[1])));
                    // return $job_shifting;
                    $job_shifting->save();
                }
                // $job->shifting_timings = $request->shifting_timings;
            }

            $total =  $job->hiring_budget;
            $taxTotal =  $total * 5 / 100;
            $subTotal =  $total + $taxTotal;

            $data = array(
                'job_id' => $job->id,
                'total' => $total,
                'taxTotal' => $taxTotal,
                'subTotal' => $subTotal,
            );

            // return $data;

            if ($job) {
                return response()->json(["status" => true,  "message" => 'Complete the payment and post the job.', "data" => $data]);
            } else {
                return response()->json(["status" => false, "message" => "Something went wrong. Please try again"]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }





    /** 
     @authenticated
     * 
     * @bodyParam hospital_name string required Example: abc hospital
     * @bodyParam employee_required string required Example: 10
     * @bodyParam licence_type string required Example: 1|2
     * @bodyParam skills string required Example: nursing
     * @bodyParam hiring_budget string required Example: 30000
     * @bodyParam hospital_phone string required Example: 9876543210
     * @bodyParam experience string required Example: 1 year
     * @bodyParam urgent_requirement string required Example: 1|0
     * @bodyParam hospital_location string required Example: kolkata
     * @bodyParam hospital_zipcode string required Example: 700001
     * @bodyParam shifting_timings string required Example: day
     * @bodyParam terms_and_conditions string required Example: 1|0
     * @response  {
    "status": true,
    "message": "Job successfully updated.",
    "data": {
        "id": 3,
        "nurse_id": null,
        "hospital_id": 5,
        "additional_instructions": null,
        "hospital_name": "xyz hospital",
        "employee_required": "1",
        "licence_type": 1,
        "skills": "nursing",
        "shifting_timings": "day",
        "hiring_budget": "30000",
        "hospital_phone": "9876543210",
        "experience": "1 year",
        "urgent_requirement": "1",
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
        "payment_status": 1,
        "cancelled_by": null,
        "cancellation_reason": null,
        "cancellation_comment": null,
        "cancelled_at": null,
        "active": 0,
        "created_at": "2022-03-04T10:00:42.000000Z",
        "updated_at": "2022-03-04T10:02:08.000000Z"
    }
}
     */


    public function updateJob(Request $request, $id)
    {
        $rules = [
            'hospital_name' => ['required'],
            'employee_required' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1'],
            'licence_type' => ['required'],
            'skills' => ['required'],
            'hiring_budget' => ['required'],
            'hospital_phone' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:8', 'max:13'],
            'experience' => ['required'],
            'urgent_requirement' => ['required'],
            'hospital_location' => ['required'],
            'hospital_zipcode' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:5', 'max:10'],
            'shifting_timings' => ['required'],
            // 'terms_and_conditions' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(["status" => false, "message"  => $validator->errors()->first()]);
        }

        try {
            $job = Jobs::find($id);

            if (!$job) {
                return response()->json(["status" => false, "message"  => 'Job not found.']);
            }

            $job->hospital_name = $request->hospital_name;
            $job->employee_required = $request->employee_required ?? 1;
            $job->licence_type = $request->licence_type;
            $job->skills = $request->skills;
            $job->hiring_budget = $request->hiring_budget;
            $job->hospital_phone = $request->hospital_phone;
            $job->experience = $request->experience;
            $job->urgent_requirement = $request->urgent_requirement;
            $job->hospital_location = $request->hospital_location;
            $job->hospital_zipcode = $request->hospital_zipcode;
            $job->shifting_timings = $request->shifting_timings;
            // $job->terms_and_conditions = $request->terms_and_conditions;
            $job->hospital_id = auth()->user()->id;
            $job->save();

            if ($job) {
                return response()->json(["status" => true,  "message" => 'Job successfully updated.', "data" => $job]);
            } else {
                return response()->json(["status" => false, "message" => "Something went wrong. Please try again"]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }


    /** 
     @authenticated
     * @response {
    "status": true,
    "message": "Job successfully removed.",
    "data": []
     */

    public function removeJob(Request $request, $id)
    {
        try {
            $job = Jobs::find($id);

            if (!$job) {
                return response()->json(["status" => false, "message"  => 'Job not found.']);
            }
            $job->job_status = 4;
            $job->save();

            return response()->json(["status" => true,  "message" => 'Job successfully removed.', "data" => []]);
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
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "nurse_id": null,
                "hospital_id": 3,
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
                "created_at": "2022-03-17T12:33:34.000000Z",
                "updated_at": "2022-03-17T12:33:34.000000Z",
                "job_application_count": 0,
                "nursetype": {
                    "id": 1,
                    "type_name": "CAN",
                    "active": 1,
                    "created_at": null,
                    "updated_at": null
                }
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/hospital/total-job-list?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/hospital/total-job-list?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/hospital/total-job-list?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/hospital/total-job-list",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
     */
    public function totalJobList(Request $request)
    {
        try {
            $jobs = Jobs::where('hospital_id', auth()->user()->id)->where('payment_status', 2)->with('nursetype', 'jobShifting')->withCount('jobApplication')->whereNotIn('job_status', [4])->orderBy('id', 'DESC')->paginate(10);

            if ($jobs->count()) {
                return response()->json(["status" => true,  "message" => '', "data" => $jobs]);
            } else {
                return response()->json(["status" => true,  "message" => 'No Job found.', "data" => $jobs]);
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
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "nurse_id": null,
                "hospital_id": 3,
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
                "created_at": "2022-03-17T12:33:34.000000Z",
                "updated_at": "2022-03-17T12:33:34.000000Z",
                "job_application_count": 0,
                "nursetype": {
                    "id": 1,
                    "type_name": "CAN",
                    "active": 1,
                    "created_at": null,
                    "updated_at": null
                }
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/hospital/recent-job-list?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/hospital/recent-job-list?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/hospital/recent-job-list?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/hospital/recent-job-list",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
     */
    public function recentJobList(Request $request)
    {
        try {
            $befor7day = \Carbon\Carbon::today()->subDays(7);
            $jobs = Jobs::where('hospital_id', auth()->user()->id)->where('payment_status', 2)->with('nursetype', 'jobShifting')
                ->withCount([
                    'jobApplication',
                    'jobApplication as job_application_count' => function ($query) {
                        $befor1day = \Carbon\Carbon::now()->subDays(1);
                        $query->where('status', null)->where('created_at', '>=', $befor1day);
                    }
                ])
                ->whereNotIn('job_status', [4])->orderBy('id', 'DESC')->where('created_at', '>=', $befor7day)->paginate(10);
            if ($jobs->count()) {
                return response()->json(["status" => true,  "message" => '', "data" => $jobs]);
            } else {
                return response()->json(["status" => true,  "message" => 'No Job found.', "data" => $jobs]);
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
        "payment_status": 1,
        "cancelled_by": null,
        "cancellation_reason": null,
        "cancellation_comment": null,
        "cancelled_at": null,
        "active": 0,
        "created_at": "2022-02-17T12:11:40.000000Z",
        "updated_at": "2022-03-03T12:11:40.000000Z",
        "hospital": {
            "id": 5,
            "first_name": "test",
            "last_name": "hospital",
            "email": "dakoqet@vomoto.com",
            "phone": "9876543211",
            "full_name": "test hospital",
            "role_name": "HOSPITAL",
            "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF"
        },
        "job_application": [
            {
                "id": 1,
                "user_id": 5,
                "job_id": 1,
                "status": null,
                "created_at": "2022-03-02T14:15:34.000000Z",
                "updated_at": "2022-03-02T14:15:34.000000Z",
                "nurse": {
                    "id": 5,
                    "first_name": "test",
                    "last_name": "hospital",
                    "email": "dakoqet@vomoto.com",
                    "phone": "9876543211",
                    "experience_year": null,
                    "experience_month": null,
                    "full_name": "test hospital",
                    "role_name": "HOSPITAL",
                    "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF"
                }
            },
            {
                "id": 2,
                "user_id": 7,
                "job_id": 1,
                "status": null,
                "created_at": "2022-03-04T06:51:00.000000Z",
                "updated_at": "2022-03-04T06:51:00.000000Z",
                "nurse": {
                    "id": 7,
                    "first_name": "test nurse",
                    "last_name": null,
                    "email": "tajuzol@tafmail.com",
                    "phone": "9876543212",
                    "experience_year": "3",
                    "experience_month": "7",
                    "full_name": "test nurse ",
                    "role_name": "NURSE",
                    "profile_photo_url": "https://ui-avatars.com/api/?name=test+nurse&color=7F9CF5&background=EBF4FF"
                }
            }
        ]
    }
}
     */

    public function jobView(Request $request, $id)
    {
        try {
            $job = Jobs::where('hospital_id', auth()->user()->id)->where('payment_status', 2)->with('hospital:id,first_name,last_name,email,phone', 'jobApplication', 'nursetype', 'jobApplication.nurse', 'jobShifting', 'jobApplication.nurse.experience_data')->find($id);
            if ($job) {
                return response()->json(["status" => true,  "message" => '', "data" => $job]);
            } else {
                return response()->json(["status" => false,  "message" => 'No Job found.', "data" => $job]);
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
        "user_id": 3,
        "job_id": 1,
        "comment": null,
        "license": null,
        "status": null,
        "is_applied": 1,
        "created_at": "2022-03-21T13:10:14.000000Z",
        "updated_at": "2022-03-21T13:10:14.000000Z",
        "license_path": "",
        "nurse": {
            "id": 3,
            "first_name": "user1",
            "last_name": "nurse",
            "company_name": null,
            "email": "usernurse9@yopmail.com",
            "username": "usernurse9",
            "phone": "1234567891",
            "address": "test",
            "email_verified_at": null,
            "social_id": null,
            "social_account_type": null,
            "profile_photo_path": "1647868174-9074.png",
            "experience_id": null,
            "language_id": null,
            "skill_id": null,
            "cover_photo_path": null,
            "refer_code": null,
            "referrer_id": null,
            "country_id": null,
            "country_name": "test",
            "state_id": null,
            "state_name": null,
            "city_id": null,
            "city_name": "test",
            "zipcode": "12345",
            "experience_year": "1",
            "experience_month": "1",
            "experience": null,
            "gender": null,
            "salary": null,
            "resume_path": null,
            "date_of_birth": null,
            "licence_number": null,
            "lpn": null,
            "can": null,
            "security_question": "test",
            "security_answer": "test",
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
            "terms_and_condiction_1": "1",
            "terms_and_condiction_2": "1",
            "terms_and_condiction_3": "1",
            "created_at": "2022-03-21T13:09:34.000000Z",
            "updated_at": "2022-03-21T13:09:34.000000Z",
            "stripe_id": null,
            "pm_type": null,
            "pm_last_four": null,
            "trial_ends_at": null,
            "full_name": "user1 nurse",
            "role_name": "NURSE",
            "profile_photo_url": "http://127.0.0.1:8000/storage/1647868174-9074.png",
            "cover_photo_url": "",
            "resume_url": "",
            "experience_data": null
        },
        "job": {
            "id": 1,
            "licence_type": 1,
            "nursetype": {
                "id": 1,
                "type_name": "CAN",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        }
    }
}
     */

    public function applicationDetails(Request $request, $id)
    {
        try {
            $application = JobApplication::with('nurse', 'nurse.experience_data', 'job:id,licence_type', 'job.nursetype', 'job.jobShifting', 'selectShiftingTime')->find($id);
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
            "id": 2,
            "user_id": 7,
            "job_id": 1,
            "comment": null,
            "license": null,
            "status": 1,
            "created_at": "2022-03-22T06:51:00.000000Z",
            "updated_at": "2022-03-04T11:08:16.000000Z",
            "license_path": "",
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
                "profile_photo_url": "http://localhost/storage/1646287708-3424.jpg"
            },
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
            }
        }
    ]
}
     */
    public function applicationList(Request $request, $job_id = '')
    {
        // try {
        $befor1day = \Carbon\Carbon::now()->subDays(1);
        // $applications = JobApplication::with('nurse', 'job');

        $applications = JobApplication::with('nurse', 'nurse.experience_data', 'job', 'job.nursetype', 'job.jobShifting')->with(['job' => function ($query) {
            $query->withCount([
                'jobApplication',
                'jobApplication as job_application_count' => function ($query) {
                    $befor1day = \Carbon\Carbon::now()->subDays(1);
                    $query->where('status', null)->where('created_at', '>=', $befor1day);
                }
            ]);
        }])->whereHas('job', function ($query) {
            $query->where('hospital_id', auth()->user()->id)
                ->where('payment_status', 2)->whereNotIn('job_status', [4]);
        })
            ->where('created_at', '>=', $befor1day);

        if (!empty($job_id)) {
            $applications = $applications->where('job_id', '=', $job_id);
        }


        $applications = $applications->get();
        if ($applications->count()) {
            return response()->json(["status" => true,  "message" => '', "data" => $applications]);
        } else {
            return response()->json(["status" => false,  "message" => 'No application found.', "data" => $applications]);
        }
        // } catch (\Exception $e) {
        //     Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
        //     return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        // }
    }



    /** 
     @authenticated
     * @response  {
    "status": true,
    "message": "",
    "data": {
        "recent_job": 1,
        "total_job": 2,
        "last_application": 1
    }
   }
     */

    public function jobCountDetails(Request $request)
    {
        try {

            $befor7day = \Carbon\Carbon::today()->subDays(7);
            $recentJob = Jobs::where('created_at', '>=', $befor7day)->where('hospital_id', auth()->user()->id)->whereNotIn('job_status', [4])->where('payment_status', 2)->count();
            $totalJob = Jobs::where('hospital_id', auth()->user()->id)->whereNotIn('job_status', [4])->where('payment_status', 2)->count();

            $befor1day = \Carbon\Carbon::now()->subDays(1);

            $last_application = JobApplication::whereHas('job', function ($query) {
                $query->where('hospital_id', auth()->user()->id)->whereNotIn('job_status', [4])->where('payment_status', 2);
            })->where('status', null)->where('created_at', '>=', $befor1day)->count();

            $data['recent_job'] = $recentJob;
            $data['total_job'] = $totalJob;
            $data['last_application'] = $last_application;
            return response()->json(["status" => true,  "message" => '', "data" => $data]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /** 
     @authenticated
     * @bodyParam application_id string required Example: 1
     * @bodyParam status string required Example: 0|1|2

     * @response  {
    "status": true,
    "message": "Successfully Accepted"
}
     */
    public function jobApplicationAcceptReject(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "application_id" =>  "required",
                "status" =>  "required",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $job_application = JobApplication::find($request->application_id);

            if ($request->status == 2) {
                if ($job_application->status == 2) {
                    return response()->json(["status" => false, "message" => 'You already approved the application.']);
                }
                // $get_comfirm_job = JobApplication::where('job_id', $job_application->job_id)->where('status', 2)->first();
                // if ($get_comfirm_job->id) {
                //     return response()->json(["status" => false, "message" => 'You already approved the application.']);
                // }

                $job_application->approve_time = now();
            }
            $job_application->status = $request->status;
            $job_application->save();

            $status = '';
            if ($job_application->status == 0) {
                $status = 'rejected';
            }

            if ($job_application->status == 1) {
                $status = 'accepted';
            }

            if ($job_application->status == 2) {
                $status = 'approved';
            }

            if ($job_application->status == 2) {
                $notifyDetails["type"] = 'Application';
                $notifyDetails["title"] = 'Application';
                $notifyDetails["body"] = 'Your application ' . $status;
                $notifyDetails["application_id"] = $job_application->id;
                $notifyDetails["hospital_name"] = $job_application->job->hospital_name;
                $notifyDetails["hospital_image"] = auth()->user()->profile_photo_url;
                $notifyDetails["cover_photo_url"] = auth()->user()->cover_photo_url;
                $notify_user = User::find($job_application->user_id);
                Notification::send($notify_user, new UserNotification($notifyDetails));
            }

            $message = 'Successfully ' . $status;
            return response()->json(["status" => true, "message" => $message]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /** 
     @authenticated
     * @bodyParam card_no string required Example: 4242424242424242
     * @bodyParam exp_month string required Example: 01
     * @bodyParam exp_year string required Example: 2022
     * @bodyParam cvv string required Example: 123
     * @bodyParam card_full_name string required Example: jhon
     * @bodyParam total_amount string required Example: 200
     * @bodyParam job_id string required Example: 2

     * @response  {
    "status": true,
    "message": "Payment successful."
}
     */
    public function payment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "card_no"  =>  "required|regex:/^[0-9]+$/",
                "exp_month"  =>  "required|regex:/^[0-9]+$/",
                "exp_year"  =>  "required|regex:/^[0-9]+$/",
                "cvv"  =>  "required|regex:/^[0-9]+$/",
                "card_full_name" => "required",
                "total_amount" => "required",
                "job_id" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));


            $stripe_token = $stripe->tokens->create([
                'card' => [
                    'number'    => $request->card_no,
                    'exp_month' => $request->exp_month,
                    'exp_year'  => $request->exp_year,
                    'cvc'       => $request->cvv,
                ],
            ]);

            // return $stripe_token;

            $user = auth()->user();

            $customer = $stripe->customers->create(
                [
                    'email' => $user->email,
                    'name' => $user->full_name,
                    'source' => $stripe_token->id
                ]
            );


            $res = $stripe->charges->create([
                "amount" => 100 * 100,
                "currency" => "INR",
                "source" => $stripe_token->card->id,
                "customer" => $customer->id,
                "description" => "Test payment",
            ]);

            if ($res) {
                $get_job = Jobs::find($request->job_id);
                $get_job->payment_status = 2;
                $get_job->save();

                $payment_details = new PaymentDetails;
                $payment_details->user_id = auth()->user()->id;
                $payment_details->job_id = $request->job_id;
                $payment_details->total_amount = $request->total_amount;
                // $payment_details->card_id =  $stripe_token->id;
                $payment_details->card_number =  $request->card_number;
                $payment_details->transaction_no =  $res->id;
                $payment_details->transaction_for =  1;
                $payment_details->status =  2;
                $payment_details->payment_datetime =  date('Y-m-d H:i:s');
                $payment_details->save();
            }
            // return $res;

            return response()->json(["status" => true, "message" => "Payment is successfully done.Now your job is activated."]);
        } catch (\Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }
}
