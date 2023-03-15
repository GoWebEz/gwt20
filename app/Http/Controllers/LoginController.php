<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Exception;
use Illuminate\Support\Facades\Log;

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
    public function forgotPassword(Request $request)
    {       
        $validator = Validator::make($request->all(), [
            'name_email' => 'required',
            'last_name' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 200);
        }

        $email = $request->name_email;
        $lastName = $request->last_name;
        $user = User::where('last_name', $lastName)
            ->where(function ($query) use ($email) {
                $query->where('user_name', $email)
                    ->orWhere('email', $email);
            })
            ->first();
            
        $userName= User::selectraw("CONCAT(first_name,' ',last_name) AS name")                // Mail template datas
                            ->where('email',$email)
                            ->orWhere('last_name', $lastName)
                            ->first();
        if (!empty($user)) {
            $genrateToken = Str::random(15);
            $tokenExpiryTtime = Carbon::now()->adddays(1); //Set expiry time
         
            $userToken = User::where('email', $user->email)
                                ->update([
                    'token' => $genrateToken,
                    'token_expiry' => $tokenExpiryTtime,
                ]);
            if ($userToken) {
                $getToken = User::where('email', $user->email)->first();
                $mail_details = [
                    'full_name' => $userName->name,
                    'token' => $getToken->token,
                    'token_expiry' => $user->token_expiry,
                    'add_user' => false,
                    'change_password' => false
                ];
            }
            try {

                Mail::to($user->email)->send(new SendMail($mail_details));
                
                $response = [
                    "status" => 'Success',
                    "message" => "Mail sent successfully.",
                ];

                return response($response, 200);
            } catch (Exception $e) {
                Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            }

        } else {
            $response = [
                "status" => 'error',
                "message" => "Invalid email address or last name.",
            ];

            return response($response, 200);
        }
    }

    /* Update New password */

    public function emailVerify(Request $request)
    {
        $token = $request->t;
        $type = $request->type;
        $checkTokenExists = User::where('token', $token)->exists();
        if ($checkTokenExists) {
            $getUserDetails = User::where('token', $token)
                                    ->where('token_expiry', '>=', Carbon::now())
                                    ->first();
            if ($getUserDetails && $type == 'r') {
                return view("auth.passwords.reset")->with("$token");
            }else if ($getUserDetails && $type == 'a') {

                return redirect("create-password?t=$token");
            }else if($getUserDetails && $type == 'c'){

                return redirect("change-password?t=$token");
            }else {
                $response = [
                    "status" => 422,
                    "message" => "Token has been expierd.",
                ];
                return response($response, 422);
            }
        }else {
            return redirect("verifiy-email");
        }
    }



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

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
