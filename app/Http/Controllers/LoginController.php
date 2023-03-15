<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
    /* Login Function */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            $response = [
                "status"    => "Success",
                "message"   => "Login successfull.",
            ];
            return response($response, 200);

        }
        else {
            $response = [
                "status" => 'error',
                "message" => "Invalid username or password.",
            ];
            return response($response, 200);
        }
    }

    /* Forgot Password Function */
    // public function forgotPassword(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name_email' => 'required',
    //         'last_name' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response(['errors' => $validator->errors()->all()], 200);
    //     }

    //     $name_email = $request->name_email;
    //     $last_name = $request->last_name;
    //     $user = User::where('last_name', $last_name)
    //         ->where(function ($query) use ($name_email) {
    //             $query->where('user_name', $name_email)
    //                 ->orWhere('email', $name_email);
    //         })
    //         ->first();

    //     $user_name= User::selectraw("CONCAT(first_name,' ',last_name) AS name")                // Mail template datas
    //                         ->where('email',$name_email)
    //                         ->orWhere('last_name', $last_name)
    //                         ->first();
    //     if (!empty($user)) {
    //         $genrate_token = Str::random(15);
    //         $token_expiry_time = Carbon::now()->adddays(1); //Set expiry time
    //         $user_token = User::where('email', $user->email)
    //             ->update([
    //                 'token' => $genrate_token,
    //                 'token_expiry' => $token_expiry_time,
    //             ]);
    //         if ($user_token) {
    //             $get_token = User::where('email', $user->email)->first();
    //             $mail_details = [
    //                 'full_name' => $user_name->name,
    //                 'token' => $get_token->token,
    //                 'token_expiry' => $user->token_expiry,
    //                 'add_user' => false,
    //                 'change_password' => false
    //             ];
    //         }
    //         try {

    //             Mail::to($user->email)->send(new SendMail($mail_details));

    //             $response = [
    //                 "status" => 'Success',
    //                 "message" => "Mail sent successfully.",
    //             ];

    //             return response($response, 200);
    //         } catch (Exception $e) {
    //             Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
    //         }

    //     } else {
    //         $response = [
    //             "status" => 'error',
    //             "message" => "Invalid email address or last name.",
    //         ];

    //         return response($response, 200);
    //     }
    // }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
