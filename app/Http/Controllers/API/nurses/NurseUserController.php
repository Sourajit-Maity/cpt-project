<?php

namespace App\Http\Controllers\API\nurses;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Nurse\NurseProfileResource;
use Hash;

/**
 * @group  Nurse User Authentication
 *
 * APIs for managing basic auth functionality
 */
class NurseUserController extends Controller
{
    /** 
     * @bodyParam  name string required  Example: John Doe
     * @bodyParam  email string required  Example: John@gmail.com
     * @bodyParam  username string required  Example: JohnDoe
     * @bodyParam  phone string required  Example: 9876543210
     * @bodyParam  password string required  Example: 123456
     * @bodyParam  security_question string required  Example: questions
     * @bodyParam  security_answer string required  Example: answer
     * @bodyParam  profile_photo image required
     * @bodyParam  lpn string required Example: 123456
     * @bodyParam  can string required Example: 123456
     * @bodyParam  documents image required
     * @bodyParam  address string required Example: kolkata-700001
     * @bodyParam  country string required Example: 1
     * @bodyParam  city string required Example: 1
     * @bodyParam  zip string required Example: 700001
     * @bodyParam  experience_year string required Example: 1
     * @bodyParam  experience_month string required Example: 1
     * @bodyParam  terms_and_condiction_1 string required Example: 0|1
     * @bodyParam  terms_and_condiction_2 string required Example: 0|1
     * @bodyParam  terms_and_condiction_3 string required Example: 0|1
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
        //try {
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required",
            "username"  =>  "required|unique:users,username|min:4",
            "email"  =>  "required|email|unique:users",
            "phone"  =>  "required",
            "password"  =>  "required|min:6",
            "security_question"  =>  "required",
            "security_answer"  =>  "required",
            "profile_photo"  =>  "required",
            "lpn"  =>  "nullable",
            "can"  =>  "nullable",
            "documents"  =>  "required",
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            //'licence_type' => 'required',
            'zip' => 'required',
            'experience_year' => 'required',
            'experience_month' => 'required',
            'terms_and_condiction_1' => 'required',
            'terms_and_condiction_2' => 'required',
            'terms_and_condiction_3' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => false, "message" => $validator->errors()->first()]);
        }

        $name = $request->get('name');

        $splitName = explode(' ', $name, 2);

        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';


        $user   = new  User;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        //$user->first_name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = $request->password;
        //$user->licence_type = $request->licence_type;
        $user->email = $request->email;
        $user->security_question = $request->security_question;
        $user->security_answer = $request->security_answer;
        if ($request->hasFile('profile_photo')) {
            $filename = time() . '-' . rand(1000, 9999) . '.' . $request->profile_photo->extension();
            $request->file('profile_photo')->storeAs('public', $filename);
            $user->profile_photo_path = $filename;
        }
        $user->lpn = $request->lpn;
        $user->can = $request->can;
        $user->address = $request->address;
        $user->country_name  = $request->country;
        $user->city_name  = $request->city;
        $user->zipcode = $request->zip;
        $user->experience_year = $request->experience_year;
        $user->experience_month = $request->experience_month;
        $user->terms_and_condiction_1 = $request->terms_and_condiction_1;
        $user->terms_and_condiction_2 = $request->terms_and_condiction_2;
        $user->terms_and_condiction_3 = $request->terms_and_condiction_3;
        $user->save();
        $user->assignRole('NURSE');

        if ($files = $request->file('documents')) {
            foreach ($files as $imagefile) {
                $user_document = new UserDocument();
                $user_document->user_id = $user->id;
                $filename = time() . '-' . rand(1000, 9999) . '.' . $imagefile->extension();
                $imagefile->storeAs('public', $filename);
                $user_document->file = $filename;
                $user_document->save();
            }
        }
        $token = $user->createToken('token')->plainTextToken;
        if (!is_null($user)) {
            return response()->json(["status" => true, "token" => $token, "message" => "Success! registration completed", "data" => $user]);
        } else {
            return response()->json(["status" => false, "message" => "Registration failed!"]);
        }
        // } catch (\Exception $e) {
        //     Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
        //     return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        // }
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
                    "name"  =>  "required",
                    // "last_name"  =>  "required",
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
                $user->first_name = $request->name;
                // $user->last_name = $request->last_name;
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
     * @authenticated
     * @response  {
    "status": true,
    "data": {
        "first_name": "user",
        "last_name": "nurse",
        "full_name": "user nurse",
        "company_name": null,
        "email": "usernurse9@yopmail.com",
        "date_of_birth": "24/1/2021",
        "username": "usernurse9",
        "phone": "1234567891",
        "address": "test",
        "zipcode": "12345",
        "country_name": "test",
        "state_name": null,
        "city_name": "test",
        "licence_number": null,
        "lpn": null,
        "can": null,
        "security_question": "test",
        "security_answer": "test",
        "experience_month": "1",
        "experience_year": "1",
        "experience_id": 1,
        "from_year": "1",
        "to_year": "2",
        "gender": "female",
        "salary": "1266",
        "profile_photo_path": "http://127.0.0.1:8000/storage/1647513994-4132.png",
        "resume_path": "http://127.0.0.1:8000/upload/user_default.png",
        "cover_photo_path": "http://127.0.0.1:8000/upload/user_default.png"
    }
}
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function nurseUserDetails()
    {
        // $user = Auth::user();
        // $data = new NurseProfileResource($user);

        $user = User::where('id', auth()->user()->id)->with('experience_data')->first();

        $data = array(
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'full_name' => $user->full_name,
            'company_name' => $user->company_name,
            'email' => $user->email,
            'date_of_birth' => $user->date_of_birth,
            'username' => $user->username,
            'phone' => $user->phone,
            'address' => $user->address,
            'zipcode' => $user->zipcode,
            'country_name' => $user->country_name,
            'state_name' => $user->state_name,
            'city_name' => $user->city_name,
            'licence_number' => $user->licence_number,
            'lpn' => $user->lpn,
            'can' => $user->can,
            'security_question' => $user->security_question,
            'security_answer' => $user->security_answer,
            'experience_month' => $user->experience_month,
            'experience_year' => $user->experience_year,
            'experience_id' => $user->experience_id,
            'from_year' => isset($user->experience_data->from_year) ? $user->experience_data->from_year : null,
            'to_year' => isset($user->experience_data->to_year) ? $user->experience_data->to_year : null,
            'gender' => $user->gender,
            'salary' => $user->salary,
            'gender' => $user->gender,
            'profile_photo_path' => isset($user->profile_photo_path) ? url('/') . "/storage/" . $user->profile_photo_path : url('/') . "/upload/user_default.png",
            'resume_path' => isset($user->resume_path) ? url('/') . "/storage/" . $user->resume_path : url('/') . "/upload/user_default.png",
            'cover_photo_path' => isset($user->cover_photo_path) ? url('/') . "/storage/" . $user->cover_photo_path : url('/') . "/upload/user_default.png",

        );
        if (!is_null($user)) {
            return response()->json(["status" => true, "data" => $data]);
        } else {
            return response()->json(["status" => false, "message" => "Whoops! no user found"]);
        }
    }

    /** 
     * Nurse's profile edit
     * @authenticated
     * @bodyParam name string required 
     * @bodyParam date_of_birth string required 
     * @bodyParam email string required 
     * @bodyParam gender string required 
     * @bodyParam experience_id string required 
     * @bodyParam salary string required 
     * @bodyParam profile_photo image optional 
     * @bodyParam cover_photo image optional 
     * @bodyParam resume file optional 
     * @response  {
    "status": true,
    "message": "Profile updated successfully"
    }
     */

    public function editProfile(Request $request)
    {
        try {
            $validator  =   Validator::make($request->all(), [
                "name"  =>  "required",
                "date_of_birth"  =>  "required",
                "email"  =>  "required|email",
                "gender"  =>  "required",
                "experience_id"  =>  "required",
                "salary" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()->first()]);
            }


            $userid = auth()->user()->id;
            $user = User::find($userid);
            if ($user) {
                if ($request->hasFile('profile_photo')) {
                    $filename = time() . '-' . rand(1000, 9999) . '.' . $request->profile_photo->extension();
                    $request->file('profile_photo')->storeAs('public', $filename);
                    $user->profile_photo_path = $filename;
                }
                if ($request->hasFile('cover_photo')) {
                    $coverfilename = time() . '-' . rand(1000, 9999) . '.' . $request->cover_photo->extension();
                    $request->file('cover_photo')->storeAs('public', $coverfilename);
                    $user->cover_photo_path = $coverfilename;
                }
                if ($request->hasFile('resume')) {
                    $resumefilename = time() . '-' . rand(1000, 9999) . '.' . $request->resume->extension();
                    $request->file('resume')->storeAs('public', $resumefilename);
                    $user->resume_path = $resumefilename;
                }
                $name = $request->get('name');

                $splitName = explode(' ', $name, 2);

                $first_name = $splitName[0];
                $last_name = !empty($splitName[1]) ? $splitName[1] : '';

                // $user->first_name = $request->name;
                $user->first_name = $first_name;
                $user->last_name = $last_name;
                $user->date_of_birth = $request->date_of_birth;
                $user->email = $request->email;
                $user->gender = $request->gender;
                $user->experience_id = $request->experience_id;
                $user->salary = $request->salary;

                $user->update();
                return response()->json(["status" => true, "message" => "Profile updated successfully"]);
            } else {
                return response()->json(["status" => false, "message" => "Nurse not found"]);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }

    /**
     * Change Password
     * @authenticated
     * @bodyParam old_password string required 
     * @bodyParam new_password string required 
     * @bodyParam confirm_password string required 
     * @response {
     "status": true,
     "message": "Password changed successfully"
    }
     */

    public function nurseChangePassword(Request $request)
    {
        try {
            $validator  =   Validator::make($request->all(), [
                "old_password"  =>  "required|min:8",
                "new_password"  =>  "required|min:8",
                "confirm_password" =>  "required|same:new_password",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            }
            $userid = auth()->user()->id;
            $user = User::find($userid);
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json(["status" => false, "message" => "Old password didn't match"]);
            } else {
                $user->update([
                    'password' => $request->new_password
                ]);
                return response()->json(["status" => true, "message" => 'Password changed successfully']);
            }
        } catch (\Exception $e) {
            Log::error(" :: EXCEPTION :: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return Response()->Json(["status" => false, "message" => 'Something went wrong. Please try again',]);
        }
    }
}
