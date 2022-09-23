<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @group  Task management
 *
 * APIs for managing Tasks
 */
class TaskController extends Controller
{
/** 
 * @authenticated
 * @response  {
    "status": true,
    "data": [
        {
            "id": 1,
            "title": "new task",
            "description": "demo description",
            "user_id": 56,
            "created_at": "2021-02-17T15:24:36.000000Z",
            "updated_at": "2021-02-17T15:24:36.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        },
        {
            "id": 2,
            "title": "new task",
            "description": "demo description",
            "user_id": 56,
            "created_at": "2021-02-17T15:27:09.000000Z",
            "updated_at": "2021-02-17T15:27:09.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        },
        {
            "id": 3,
            "title": "new task",
            "description": "demo description",
            "user_id": 56,
            "created_at": "2021-02-17T15:28:28.000000Z",
            "updated_at": "2021-02-17T15:28:28.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        },
        {
            "id": 5,
            "title": "updated title",
            "description": "updated desc",
            "user_id": 56,
            "created_at": "2021-02-17T15:45:03.000000Z",
            "updated_at": "2021-02-17T15:46:40.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        }
    ]
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
    public function index()
    {
        return response()->json(["status" => true, "data" => auth()->user()->task]);
    }

/** 
 * @authenticated
 * @bodyParam title string required Example: demo task
 * @bodyParam description string required Example: demo task description
 * @response  {
    "status": true,
    "message": "Success! task created",
    "data": {
        "title": "demo task",
        "description": "demo task description",
        "user_id": 56,
        "updated_at": "2021-02-18T13:11:01.000000Z",
        "created_at": "2021-02-18T13:11:01.000000Z",
        "id": 8
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
    public function store(Request $request)
    {
            $validator      =   Validator::make($request->all(), [
                "title"         =>      "required",
                "description"   =>      "required"            
            ]);

            if($validator->fails())
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);

            $task=new Task($request->all());
            $task->user_id=auth()->user()->id; 
            $task->save();

            return response()->json(["status" => true, "message" => "Success! task created", "data" => $task]);
    }
/** 
 * @authenticated
 * @urlParam task number required Example: 5
 * @response  {
    "status": true,
    "data": {
        "id": 8,
        "title": "demo task",
        "description": "demo task description",
        "user_id": 56,
        "created_at": "2021-02-18T13:11:01.000000Z",
        "updated_at": "2021-02-18T13:11:01.000000Z",
        "user": {
            "id": 56,
            "first_name": "john",
            "last_name": "doe",
            "email": "john@gmail.com",
            "phone": "1122334455",
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": null,
            "active": 0,
            "created_at": "2021-02-18T12:14:01.000000Z",
            "updated_at": "2021-02-18T12:14:01.000000Z",
            "full_name": "john doe",
            "role_name": "CLIENT"
        }
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
    public function show(Task $task)
    {
        return response()->json(["status" => true, "data" => $task]);
    }
/** 
 * @authenticated
 * @urlParam task number required Example: 5
 * @bodyParam title string required Example: demo task
 * @bodyParam description string required Example: demo task description
 * @response  {
    "status": true,
    "message": "Success! task updated",
    "data": {
        "id": 8,
        "title": "updated title",
        "description": "updated description",
        "user_id": 56,
        "created_at": "2021-02-18T13:11:01.000000Z",
        "updated_at": "2021-02-18T13:33:05.000000Z",
        "user": {
            "id": 56,
            "first_name": "john",
            "last_name": "doe",
            "email": "john@gmail.com",
            "phone": "1122334455",
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": null,
            "active": 0,
            "created_at": "2021-02-18T12:14:01.000000Z",
            "updated_at": "2021-02-18T12:14:01.000000Z",
            "full_name": "john doe",
            "role_name": "CLIENT"
        }
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
    public function update(Request $request, Task $task)
    {
        $validator      =       Validator::make($request->all(), [
            "title"           =>      "required",
            "description"     =>      "required",
        ]);
        if($validator->fails()) 
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);

        $task->update($request->all());
        return response()->json(["status" => true, "message" => "Success! task updated", "data" => $task]);
    }
/** 
 * @authenticated
 * @urlParam task number required Example: 5
 * @response  {
    "status": true,
    "message": "Success! task deleted"
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(["status" => true, "message" => "Success! task deleted"], 200);
    }
}