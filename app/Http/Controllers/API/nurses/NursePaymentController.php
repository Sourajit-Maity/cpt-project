<?php

namespace App\Http\Controllers\API\nurses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\NurseBankDetails;
use App\Models\NursePaymentHistory;
use App\Models\NurseMoneyWithdrawl;
use App\Http\Resources\Nurse\NurseProfileResource;
use App\Mail\AutoGeneratedMail;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stripe;
/**
 * @group Nurse Payment Details
 *
 * APIs for managing nurse payment functionality
 */
class NursePaymentController extends Controller
{
     /** 
     * @authenticated
     * @bodyParam bank_name string Example: DBS
     * @bodyParam routing_number string required Example: 54555
     * @bodyParam account_number string required Example: 55446546454545
     * @bodyParam account_holder_name string required Example: Jhon doe
     * @bodyParam additional_document file required
     * @response  {
            "status": true,
            "status_code": 200,
            "message": "Successfully added"
        }

     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function addEditAccount(Request $request)
    {

        $user = Auth::user();
        $exist_check = NurseBankDetails::where('user_id', $user->id)->first();

        $errors = Validator::make($request->all(), [
            "bank_name"  =>  "nullable",
            "routing_number"  =>  "required|numeric",
            "account_number"  =>  "required|numeric",
            "account_holder_name"  =>  "required|max:255",
            "additional_document"  =>  "required|mimes:jpg,png",
        ])->errors();

        if (count($errors)) {
            $errors = json_decode($errors);

            if (isset($errors->bank_name[0])) {
                $error = $errors->bank_name[0];
                return response()->json(['status' => false, "status_code" => 201, 'message' => $error]);
            }

            if (isset($errors->routing_number[0])) {
                $error = $errors->routing_number[0];
                return response()->json(['status' => false, "status_code" => 201, 'message' => $error]);
            }

            if (isset($errors->account_number[0])) {
                $error = $errors->account_number[0];
                return response()->json(['status' => false, "status_code" => 201, 'message' => $error]);
            }

            if (isset($errors->account_holder_name[0])) {
                $error = $errors->account_holder_name[0];
                return response()->json(['status' => false, "status_code" => 201, 'message' => $error]);
            }

            if (isset($errors->additional_document[0])) {
                $error = $errors->additional_document[0];
                return response()->json(['status' => false, "status_code" => 201, 'message' => $error]);
            }
        }

        DB::beginTransaction();

        if (is_null($exist_check)) {

            $insert = NurseBankDetails::create([
                'bank_name' => $request->bank_name,
                'account_holder_name' => $request->account_holder_name,
                'routing_number' => $request->routing_number,
                'account_number' => $request->account_number,
                'user_id' => $user->id,
            ]);

            if (!is_null($insert)) {

                if ($file = $request->file('additional_document')) {
                    $destinationPath = public_path('upload/nurse/document/');
                    $fileName = Str::random(20) . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath, $fileName);
                    $insert->update([
                        'additional_document' => $fileName,
                    ]);
                }

                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                //create stripe bank token
                try {
                    $bank_data =  $stripe->tokens->create([
                        'bank_account' => [
                            'country' => 'US',
                            'currency' => 'usd',
                            'account_holder_name' => $request->account_holder_name,
                            'account_holder_type' => 'individual',
                            'routing_number' => $request->routing_number,
                            'account_number' => $request->account_number,
                        ],
                    ]);

                    $insert->stripe_bank_id = isset($bank_data->id) ? $bank_data->id : null;
                    $insert->update();
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(["status" => false, "status_code" => 204, "message" => "Failed!, Please check your account details"]);
                }


                try {
                    //create account through bank token
                    $account_data = $stripe->accounts->create([
                        'country' => 'US',
                        'type' => 'custom',
                        'email' => $user->email,
                        'business_type' => 'individual',
                        'business_profile' => [
                            'mcc' => '5734',
                            'name' => $user->full_name,
                            'support_email' => $user->email,
                            'support_phone' => '713-300-1866',
                            'support_url' => 'https://pacific-nursing.dedicateddevelopers.us/',
                            'product_description' => 'Pacific Nursing Nurse Account',
                        ],
                        'individual' => [
                            'email' => $user->email,
                            'phone' => '+1-541-754-3010',
                            'first_name' => $user->first_name,
                            'last_name' => $user->last_name,
                            'ssn_last_4' => '0000',
                            'address' => [
                                'city' => 'Houston',
                                'country' => 'US',
                                'line1' => '956 Judiway St',
                                'line2' => 'Houston',
                                'postal_code' => '77018',
                                'state' => 'TX',
                            ],
                            'dob' => [
                                'day' => '17',
                                'month' => '12',
                                'year' => '1998',
                            ],
                        ],
                        'external_account' => $bank_data->id,
                        //'requested_capabilities' => ['transfers', 'card_payments'],
                        'tos_acceptance' => ['date' => time(), 'ip' => $_SERVER['REMOTE_ADDR']],
                        'capabilities' => [
                            'card_payments' => ['requested' => true],
                            'transfers' => ['requested' => true],
                        ],

                    ]);

                    $user->stripe_customer_id = isset($account_data->id) ? $account_data->id : null;
                    $user->update();
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(["status" => true, "status_code" => 204, "message" => "Failed!, try again later"]);
                }

                try {
                    // document upload
                    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/upload/nurse/document/" . $inert->additional_document, "r");

                    $document_upload = \Stripe\File::create([
                        'purpose' => 'additional_verification',
                        'file' => $fp,
                    ], [
                        'stripe_account' => $account_data->id,
                    ]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(["status" => true, "status_code" => 204, "message" => "Failed!, try again later"]);
                }

                // transfer amount 
                // $transfer_data = $stripe->transfers->create([
                //     'amount' => 400,
                //     'currency' => 'usd',
                //     'destination' => $account_data->id,
                //     'transfer_group' => 'ORDER_950',
                // ]);

                //return $transfer_data;
                DB::commit();
                return response()->json(["status" => true, "status_code" => 200, "message" => "Successfully added"]);
            } else {
                return response()->json(["status" => true, "status_code" => 204, "message" => "Failed!, try again later"]);
            }
        } else {

            $exist_check->bank_name = $request->bank_name;
            $exist_check->routing_number = $request->routing_number;
            $exist_check->account_number = $request->account_number;
            $exist_check->account_holder_name = $request->account_holder_name;

            if ($file = $request->file('additional_document')) {
                $destinationPath = public_path('upload/nurse/document/');
                $fileName = Str::random(20) . "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);
                $exist_check->additional_document = $fileName;
            }

            if ($exist_check->update()) {

                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                try {
                    //create stripe bank token
                    $bank_data =  $stripe->tokens->create([
                        'bank_account' => [
                            'country' => 'US',
                            'currency' => 'usd',
                            'account_holder_name' => $request->account_holder_name,
                            'account_holder_type' => 'individual',
                            'routing_number' => $request->routing_number,
                            'account_number' => $request->account_number,
                        ],
                    ]);

                    $exist_check->stripe_bank_id = isset($bank_data->id) ? $bank_data->id : null;
                    $exist_check->update();
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(["status" => false, "status_code" => 204, "message" => "Failed!, Please check your account details"]);
                }

                try {
                    //create account through bank token
                    $account_data = $stripe->accounts->create([
                        'country' => 'US',
                        'type' => 'custom',
                        'email' => $user->email,
                        'business_type' => 'individual',
                        'business_profile' => [
                            'mcc' => '5734',
                            'name' => $user->full_name,
                            'support_email' => $user->email,
                            'support_phone' => '713-300-1866',
                            'support_url' => 'https://pacific-nursing.dedicateddevelopers.us/',
                            'product_description' => 'Pacific Nursing Nurse Account',
                        ],
                        'individual' => [
                            'email' => $user->email,
                            'phone' => '+1-541-754-3010',
                            'first_name' => $user->first_name,
                            'last_name' => $user->last_name,
                            'ssn_last_4' => '0000',
                            'address' => [
                                'city' => 'Houston',
                                'country' => 'US',
                                'line1' => '956 Judiway St',
                                'line2' => 'Houston',
                                'postal_code' => '77018',
                                'state' => 'TX',
                            ],
                            'dob' => [
                                'day' => '17',
                                'month' => '12',
                                'year' => '1998',
                            ],
                        ],
                        'external_account' => $bank_data->id,
                        //'requested_capabilities' => ['transfers', 'card_payments'],
                        'tos_acceptance' => ['date' => time(), 'ip' => $_SERVER['REMOTE_ADDR']],
                        'capabilities' => [
                            'card_payments' => ['requested' => true],
                            'transfers' => ['requested' => true],
                        ],

                    ]);

                    $user->stripe_customer_id = isset($account_data->id) ? $account_data->id : null;
                    $user->update();
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(["status" => true, "status_code" => 204, "message" => "Failed!, try again later"]);
                }

                try {
                    // document upload
                    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/upload/nurse/document/" . $exist_check->additional_document, "r");

                    $document_upload = \Stripe\File::create([
                        'purpose' => 'additional_verification',
                        'file' => $fp,
                    ], [
                        'stripe_account' => $account_data->id,
                    ]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(["status" => true, "status_code" => 204, "message" => "Failed!, try again later"]);
                }

                DB::commit();
                return response()->json(["status" => true, "status_code" => 200, "message" => "Successfully updated"]);
            } else {
                DB::rollback();
                return response()->json(["status" => true, "status_code" => 204, "message" => "Failed!, try again later"]);
            }
        }
    }

    /** 
     * @authenticated
     * @response  {
        "status": true,
        "status_code": 200,
        "message": "Success",
        "data": {
            "id": 2,
            "bank_name": "SB",
            "routing_number": "454545",
            "account_number": "454854",
            "account_holder_name": "Jhon doe",
        }
    }

     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function accountDetails()
    {
        $user = Auth::user();
        $exist_check = NurseBankDetails::where('user_id', $user->id)
            ->select('id', 'bank_name', 'routing_number', 'account_number', 'account_holder_name')
            ->first();

        if (!is_null($exist_check)) {
            return response()->json(["status" => true, "status_code" => 200, "message" => "Success", "data" => $exist_check]);
        } else {
            return response()->json(["status" => true, "status_code" => 200, "message" => "No data found", "data" => null]);
        }
    }
}
