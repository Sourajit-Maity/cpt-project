<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\NurseType;
use App\Models\Experience;
use App\Models\ShiftTime;
use App\Models\Cms;
use App\Models\SecurityQuestion;
use Illuminate\Http\Request;
use App\Models\ForgotPassword;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

/**
 * @group User Authentication
 *
 * APIs for managing basic auth functionality
 */

class UserComonController extends Controller
{
    /**
     * @bodyParam  email string required The Email of User.
    @response  {
    "status": true,
    "message": "We've sent an OTP in your email. Pleace check and confirm.",
    "data": []
    }
     */

    public function forgotPassword(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "data" => '', "message" => $validator->errors()->all()[0],], 550);
            }

            $user = User::where('email', $request->email)->first();
            if (is_null($user)) {
                return response()->json(["status" => false, "data" => '', "message" => 'Please enter your registered email',]);
            }

            $code = mt_rand(1000, 9999);
            $data['code'] = $code;
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($request->email)->send(new ForgotPasswordMail($code));
            }

            $get_otp = ForgotPassword::where('email', $request->email)->get();
            $get_otp->each->delete();

            $otp = new ForgotPassword;
            $otp->email = $request->email;
            $otp->phone = $user->phone;
            $otp->otp = $code;
            $otp->save();
            return response()->json(["status" => true, "message" => "We've sent an OTP in your email. Pleace check and confirm.", "data" => ['phone' => $user->phone, 'country_code' => $user->country_code]]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',], 500);
        }
    }


    /**
     * @bodyParam  email string required The email of User.
     * @bodyParam  otp integer required The OTP of User.Example:3344
    @response  {
    "status": true,
    "token": "200|9YejiZ8Oy1ZPfHVk9hlUqbjdTfuv52QUrYszeWeW",
    "message": "Your OTP validation successful.",
    "data": []
}
     */
    public function forgotPasswordotpValidate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => false, "data" => '', "message" => $validator->errors()->first(),]);
        }
        try {
            $get_otp = ForgotPassword::where('email', $request->email)->where('otp', $request->otp)->first();
            if (!is_null($get_otp)) {
                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('authApiToken')->plainTextToken;
                $get_otp->delete();
                return response()->json(["status" => true, "token" => $token, "message" => "Your OTP validation successful.", "data" => []]);
            } else {
                return response()->json(["status" => false, "message" => "OTP is Wrong.", "data" => []]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',], 500);
        }
    }


    /**
     * @bodyParam  password string required The password of User.
    @response  {
    "status": true,
    "message": "Your Password successfully changed.",
    "data": []
}
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => false, "data" => '', "message" => $validator->errors()->first(),]);
        }
        try {
            $user = auth()->user();
            $user->password = $request->password;
            $user->save();
            return response()->json(["status" => true, "message" => "Your Password successfully changed.", "data" => []]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',], 500);
        }
    }


    /**
     * @authenticated
     * 
     * @response {
    "status": true,
    "data": {
        "unreadNotification": 1,
        "notification": [
            {
                "id": "63b5595a-5333-4f8a-a70d-0344020ac68b",
                "type": "App\\Notifications\\UserNotification",
                "notifiable_type": "App\\Models\\User",
                "notifiable_id": 5,
                "data": {
                    "type": "Application",
                    "title": "Application",
                    "body": "accepted",
                    "application_id": 2
                },
                "read_at": null,
                "created_at": "2022-03-04T11:53:06.000000Z",
                "updated_at": "2022-03-04T11:53:06.000000Z"
            }
        ]
    }
}
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function userNotificationList(Request $request)
    {
        try {
            $user =  auth()->user();
            $unreadNotification = $user->unreadNotifications()->count();
            $notification = $user->notifications()->get();
            $notification = $notification->take(20);

            $data['unreadNotification'] = $unreadNotification;
            $data['notification'] = $notification;


            return response()->json(['status' => true, 'data' => $data], 200);
        } catch (\Exception $e) {
            return Response()->Json(["status" => false, "message" => $e->getMessage(),], 401);
        }
    }

    /**
     * @authenticated
     * @bodyParam  user_id integer required The id of user Example:b6159cbc-80b8-4faa-8b8a-65bf74dd8cd8
     *  * @response {
    "success": true,
    "message": "You have successfully view the notification."
     }
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function readAllUserNotification(Request $request)
    {
        try {
            $request->user()->unreadNotifications->markAsRead();

            return response()->json(['status' => true, 'message' => 'You have successfully read all notifications.'], 200);
        } catch (\Exception $e) {
            return Response()->Json(["status" => false, "message" => $e->getMessage(),], 401);
        }
    }


    /**
     * @authenticated
     * @bodyParam  notification_id string required The id of notification Example:63b5595a-5333-4f8a-a70d-0344020ac68b
     *  * @response {
    "success": true,
    "message": "You have successfully view the notification."
     }
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function readNotification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'notification_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => $validator->errors()->first()], 200);
            }

            $notification = $request->user()->notifications()->find($request->notification_id);
            $read = $notification->markAsRead();
            if ($notification) {
                return response()->json(['status' => true, 'message' => 'You have successfully view the notification.'], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Something went wrong'], 200);
            }
        } catch (\Exception $e) {
            return Response()->Json(["status" => false, "message" => $e->getMessage(),], 401);
        }
    }


    /**
     * @authenticated
     * @bodyParam  notification_id string required The id of notification Example:63b5595a-5333-4f8a-a70d-0344020ac68b
     *  * @response {
    "success": true,
    "message": "You have successfully delete the notification."
     }
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function deleteNotification(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'notification_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => $validator->errors()->first()], 200);
            }

            $notification = $request->user()->notifications()->find($request->notification_id);
            $read = $notification->delete();
            if ($notification) {
                return response()->json(['status' => true, 'message' => 'You have successfully delete the notification.'], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Something went wrong'], 200);
            }
        } catch (\Exception $e) {
            return Response()->Json(["status" => false, "message" => $e->getMessage(),], 401);
        }
    }

     /**
     * Nurse Type list
     * @authenticated
     * @response {
    "status": true,
    "message": "Your nurse type list",
    "data": [
        {
            "id": 1,
            "type_name": "CAN",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "type_name": "LPN",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "type_name": "RN",
            "active": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
     */
    public function nurseTypeList()
    {
        try {
            $nurseTypes = NurseType::get();
            if ($nurseTypes) {
                return response()->json(["status" => true,  "message" => 'Your nurse type list', "data" => $nurseTypes]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any nurse type']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

     /**
     * Experience list
     * @authenticated
     * @response {
    "status": true,
    "message": "Your experience list",
    "data": [
        {
            "id": 1,
            "from_year": "1",
            "to_year": "2",
            "status": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "from_year": "2",
            "to_year": "3",
            "status": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "from_year": "3",
            "to_year": "5",
            "status": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
     */
    public function experienceList()
    {
        try {
            $experienceLists = Experience::get();
            if ($experienceLists) {
                return response()->json(["status" => true,  "message" => 'Your experience list', "data" => $experienceLists]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any experience list']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

     /**
     * Shift time list
     * @authenticated
     * @response {
    "status": true,
    "message": "Your shift time list",
    "data": [
        {
            "id": 1,
            "shift_name": "Morning",
            "shift_time": "8",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "shift_name": "Day",
            "shift_time": "8",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "shift_name": "Night",
            "shift_time": "8",
            "active": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
     */
    public function shiftTimingList()
    {
        try {
            $ShiftTimes = ShiftTime::get();
            if ($ShiftTimes) {
                return response()->json(["status" => true,  "message" => 'Your shift time list', "data" => $ShiftTimes]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any shift time']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

     /**
     * Security Question list
     * @authenticated
     * @response {
    "status": true,
    "message": "Your security question list",
    "data": [
        {
            "id": 1,
            "security_question_name": "Hobby",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "security_question_name": "School",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "security_question_name": "College",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "security_question_name": "test1",
            "active": 1,
            "created_at": "2022-03-15T13:41:54.000000Z",
            "updated_at": "2022-03-15T13:48:06.000000Z"
        }
    ]
}
     */
    public function securityQuestion()
    {
        try {
            $securityQuestions = SecurityQuestion::get();
            if ($securityQuestions) {
                return response()->json(["status" => true,  "message" => 'Your security question list', "data" => $securityQuestions]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any security question']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }

    /**
     * Terms and Condition list
     * @authenticated
     * @response {
    "status": true,
    "message": "Your terms list",
    "data": [
        {
            "id": 1,
            "title": "Copyright Policy",
            "slug": "copyright-policy",
            "text_content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            "image": null,
            "content_1_title": null,
            "content_1_text": null,
            "content_2_title": null,
            "content_2_text": null,
            "content_3_title": null,
            "content_3_text": null,
            "created_at": "2022-03-16T12:35:13.000000Z",
            "updated_at": "2022-03-16T12:35:13.000000Z"
        },
        {
            "id": 2,
            "title": "Terms of Use",
            "slug": "terms-of-use",
            "text_content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            "image": null,
            "content_1_title": null,
            "content_1_text": null,
            "content_2_title": null,
            "content_2_text": null,
            "content_3_title": null,
            "content_3_text": null,
            "created_at": "2022-03-16T12:35:14.000000Z",
            "updated_at": "2022-03-16T12:35:14.000000Z"
        },
        {
            "id": 3,
            "title": "Privacy Policy",
            "slug": "privacy-policy",
            "text_content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            "image": null,
            "content_1_title": null,
            "content_1_text": null,
            "content_2_title": null,
            "content_2_text": null,
            "content_3_title": null,
            "content_3_text": null,
            "created_at": "2022-03-16T12:35:14.000000Z",
            "updated_at": "2022-03-16T12:35:14.000000Z"
        }
    ]
}
     */
    public function termsCondition()
    {
        try {
            $terms = Cms::get();
            if ($terms) {
                return response()->json(["status" => true,  "message" => 'Your terms list', "data" => $terms]);
            } else {
                return response()->json(["status" => false,  "message" => 'You not have any terms']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again', "data" => $e]);
        }
    }
}
