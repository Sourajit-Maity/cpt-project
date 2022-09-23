<?php

namespace App\Http\Controllers\API\hospital;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

/**
 * @group  Hospital User Authentication
 *
 * APIs for managing basic auth functionality
 */
class UserController extends Controller
{
    /** 
     * @bodyParam  first_name string required  Example: John
     * @bodyParam  last_name string required  Example: Doe
     * @bodyParam  email string required  Example: John@gmail.com
     * @bodyParam  username string required  Example: JohnDoe
     * @bodyParam  phone string required  Example: 9876543210
     * @bodyParam  password string required  Example: 123456
     * @response  {
    "status": true,
    "message": "Success! registration completed",
    "data": {
        "first_name": "John",
        "last_name": "Doe",
        "username": "JohnDoe",
        "email": "John@gmail.com",
        "updated_at": "2022-02-28T14:21:58.000000Z",
        "created_at": "2022-02-28T14:21:58.000000Z",
        "id": 6,
        "full_name": "John Doe",
        "role_name": "HOSPITAL-INSTITUTE",
        "profile_photo_url": "https://ui-avatars.com/api/?name=John&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 3,
                "name": "HOSPITAL-INSTITUTE",
                "guard_name": "web",
                "created_at": "2022-02-28T12:30:26.000000Z",
                "updated_at": "2022-02-28T12:30:26.000000Z",
                "pivot": {
                    "model_id": 6,
                    "role_id": 3,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
     */
    public function register(Request $request)
    {
        try {

            $validator  =   Validator::make($request->all(), [
                "first_name"  =>  "required",
                "last_name"  =>  "required",
                "username"  =>  "required|unique:users,username|min:4",
                "email"  =>  "required|email|unique:users",
                "phone"  =>  "required",
                "password"  =>  "required|min:6"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $user   = new  User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->save();
            $user->assignRole('HOSPITAL');

            $token = $user->createToken('token')->plainTextToken;
            if (!is_null($user)) {
                return response()->json(["status" => true, "token" => $token, "message" => "Success! registration completed", "data" => $user]);
            } else {
                return response()->json(["status" => false, "message" => "Registration failed!"]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }
    /** 
     * @bodyParam username string required Example: JhoneDoe
     * @bodyParam password string required Example: 12345678
     * @response  {
    "status": true,
    "token": "6|Imv8VDsE27b1sRclxv91emCSIbLpxLmfvK3wFsAa",
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "username" =>  "required",
                "password" =>  "required",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $user = User::where("username", $request->username)->first();

            if (is_null($user)) {
                return response()->json(["status" => false, "message" => "Failed! username not found"]);
            }

            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $user       =       Auth::user();
                $token      =       $user->createToken('token')->plainTextToken;
                return response()->json(["status" => true,  "token" => $token, "data" => $user]);
            } else {
                return response()->json(["status" => false, "message" => "Whoops! invalid credential"]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }



    /** 
     * @bodyParam  first_name string required  Example: John
     * @bodyParam  last_name string required  Example: Doe
     * @bodyParam  email string required  Example: John@gmail.com
     * @bodyParam  username string required  Example: JohnDoe
     * @bodyParam  phone string required  Example: 9876543210
     * @bodyParam  password string required  Example: 123456
     * @response  {
    "status": true,
    "message": "Success! registration completed",
    "data": {
        "first_name": "John",
        "last_name": "Doe",
        "username": "JohnDoe",
        "email": "John@gmail.com",
        "updated_at": "2022-02-28T14:21:58.000000Z",
        "created_at": "2022-02-28T14:21:58.000000Z",
        "id": 6,
        "full_name": "John Doe",
        "role_name": "HOSPITAL-INSTITUTE",
        "profile_photo_url": "https://ui-avatars.com/api/?name=John&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 3,
                "name": "HOSPITAL-INSTITUTE",
                "guard_name": "web",
                "created_at": "2022-02-28T12:30:26.000000Z",
                "updated_at": "2022-02-28T12:30:26.000000Z",
                "pivot": {
                    "model_id": 6,
                    "role_id": 3,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
     */


    public function socialRegister(Request $request)
    {
        try {
            $get_user = User::where('social_id', $request->social_id)->where('email', $request->email)->first();

            if ($get_user) {
                $token = $get_user->createToken('authApiToken')->plainTextToken;
                return response()->json(["status" => true,  "token" => $token, "data" => $get_user]);
            } else {
                $validator  =   Validator::make($request->all(), [
                    "first_name"  =>  "required",
                    "last_name"  =>  "required",
                    "username"  =>  "required|unique:users,username|min:4",
                    "email"  =>  "required|email|unique:users",
                    "phone"  =>  "required",
                    "password"  =>  "required|min:6",
                    "social_id" => "required",
                ]);

                if ($validator->fails()) {
                    return response()->json(["status" => false, "message" => $validator->errors()->first()]);
                }

                $user   = new  User;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->social_id = $request->social_id;
                $user->social_account_type = $request->social_account_type;
                $user->is_verified = 1;
                $user->save();
                $user->assignRole('HOSPITAL');

                $token = $user->createToken('authApiToken')->plainTextToken;

                return response()->json(["status" => true, "token" => $token, "message" => "Success! registration completed", "data" => $user]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }






    /** 
     * @bodyParam email string required Example: John@gmail.com
     * @response  {
    "status": true,
    "token": "6|Imv8VDsE27b1sRclxv91emCSIbLpxLmfvK3wFsAa",
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
     */



    public function socialLogin(Request $request)
    {
        $rules = [
            'email' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(["status" => false, "message"  => $validator->errors()->first()]);
        }

        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->roles->pluck('name')[0] != "SUPER-ADMIN") {
                    $token = $user->createToken('token')->plainTextToken;
                    return response()->json(["status" => true,  "token" => $token, "data" => $user]);
                } else {
                    return response()->json(["status" => false, "message" => "Whoops! invalid credential"]);
                }
            } else {
                return response()->json(["status" => false, "message" => "Whoops! invalid credential"]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }



    /** 
     * @bodyParam address string required Example: kolkata - 700001
     * @bodyParam country integer required Example: 1
     * @bodyParam city integer required Example: 2
     * @bodyParam zip integer required Example: 700001
     * @response  {
    "status": true,
    "token": "6|Imv8VDsE27b1sRclxv91emCSIbLpxLmfvK3wFsAa",
    "data": {   
        "id": 55,
        "first_name": "Abhik",   
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    } 
}
     */ 
    public function addressDetails(Request $request)
    {
        try {
            $rules = [
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'zip' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $user = auth()->user();
            $user->address = $request->address;
            $user->country_id  = $request->country;
            $user->city_id  = $request->city;
            $user->zipcode = $request->zip;
            $user->save();

            return response()->json(["status" => true,  "message" => 'Address successfully updated', "data" => $user]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }




    /** 
     * @authenticated
     * @response  {
    "status": true,
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function user()
    {
        $user = Auth::user();
        if (!is_null($user)) {
            return response()->json(["status" => true, "data" => $user]);
        } else {
            return response()->json(["status" => false, "message" => "Whoops! no user found"]);
        }
    }

    /** 
     * @authenticated
     * @response  {
    "status": true,
    "message": "Location successfully updated",
    "data": {
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
        "last_latitude": 22.89002,
        "last_longitude": 88.20123,
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
     */
    public function addLocation(Request $request)
    {
        try {
            $rules = [
                'latitude' => 'required',
                'longitude' => 'required',
            ];


            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }

            $user = auth()->user();
            $user->last_latitude = $request->latitude;
            $user->last_longitude  = $request->longitude;
            $user->save();

            return response()->json(["status" => true,  "message" => 'Location successfully updated', "data" => $user]);
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

}
