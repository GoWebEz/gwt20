<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Mail\SendMail;
use App\Models\Designation;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\UserLocation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $userData = User::with('role', 'designation');
            $activeUser = $userData->where('is_active', 1)->paginate(2);
            $inActiveUser = $userData->where('is_active', 0)->paginate(2);
            $userDetails['active'] = $activeUser;
            $userDetails['in_active'] = $inActiveUser;

            return view('admin.user', ['userDetails' => $userDetails]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to get the User",
                "code" => "GWT-USER-01",
            ], 500);
        }
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
        $rules = [
            'user_name'        => 'required|unique:users',
            'first_name'       => 'required',
            'last_name'        => 'required',
            'email'            => 'required|email|unique:users',
            'designation_name' => 'required',
            'phone'            => 'nullable'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $firstName = $request->first_name ?? '';
            $lastName  = $request->last_name ?? '';
            $userData  = $validator->validated();
            $roleName  = $request->role_name;
            $designationName = $request->designationName;
            $role = Role::select('id')->where('name', $roleName)->first();
            $userData['role_id'] = $role->id;

            $designation = Designation::select('id')->where('name', $designationName)->first();
            $userData['designation_id'] = $designation->id;

            $user = Role::find($role->id)->user()->create($userData);

            $userInfo = User::with('role', 'designation')->where('id',  $user->id)->get();                       //get latest inserted value
            $userDetails = UserResource::collection($userInfo);

            if (!empty($user)) {
                $generateToken = Str::random(15);
                $tokenExpiryTime = Carbon::now()->adddays(1);                                                 //Set expiry time
                $userToken = User::where('email', $user->email)
                    ->update([
                        'token'        => $generateToken,
                        'token_expiry' => $tokenExpiryTime,
                    ]);
                if ($userToken) {
                    $getToken = User::where('email', $user->email)->first();
                    $mailDetails = [
                        'full_name'    => $user->first_name . ' ' . $user->last_name,
                        'token'        => $getToken->token,
                        'token_expiry' => $user->token_expiry,
                        'add_user'     => true,
                        'change_password' => false
                    ];
                }
                try {
                    Mail::to($user->email)->send(new SendMail($mailDetails));
                } catch (Exception $e) {
                    Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
                }
            }

            return response()->json([
                "success"  => true,
                "message"  => "User has been added successfully. And the link to create the password has been sent to the user's email address",
                "response" => $userDetails,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-USER-02\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to insert USER",
                "code" => "GWT-USER-02",
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $user = User::with('role')->where('id', $id)->get();
            return UserResource::collection($user);

            return response()->json([
                'status' => 'success',
                'response' => $user,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to edit the User",
                "code" => "GWT-USER-03",
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'role_name'        => 'required',
            'username'        => 'required',
            'first_name'       => 'required',
            'last_name'        => 'required',
            'email'            => 'required|unique:users,email,' . $id,
            'designation_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }
        try {

            $role = Role::select('id')
                ->where('name', $request->name)
                ->get();
            foreach ($role as $roles) {
                $role_id = $role->id;
            }

            $designation = Designation::select('id')
                ->where('name', $request->name)
                ->get();
            foreach ($designation as $designations) {
                $designationId = $designations->id;
            }

            $userUpdate = User::where('id', $id)
                ->update([
                    'role_id' => $role_id,
                    'username' => $request->username,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'designation_id' => $designationId,
                ]);
            if ($userUpdate) {
                $data = User::select('role_id', 'username', 'first_name', 'last_name', 'email', 'phone', 'designation_id')->where('id', $id)->get();
                return response()->json([
                    "success" => true,
                    "message" => "User updated successfully.",
                    "datas" => $data,
                ], 200);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-USER-02\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "error" => "Database Error",
                "message" => "Unable to update the User details. Code:  GWT-USER-04",
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inActiveStatus($id)
    {
        try {
            $userLocationLinked = UserLocation::where('user_id', $id)->where('is_active', 1)->get()->toArray();

            if ($userLocationLinked) {
                return response()->json([
                    'message'  => "is connected with the user location. To inactivate, please remove this user from the user location.",
                    'response' => "False",
                ], 200);
            } else {
                return response()->json([
                    'message'  => "Allow to inactive the User.",
                    'response' => "True",
                ], 200);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);

            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to inactivate the User",
                "code" => "GWT-USER-05",
            ], 500);
        }
    }
    public function inActivateUser($id)
    {
        try {

            $inActiveUser = User::where('id', $id)
                ->update([
                    'is_active' => 0,
                ]);
            return response()->json([
                'message'  => "User has been inactivated successfully",
                'response' => $inActiveUser,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);

            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "unable to activate..",
                "code"      => "GWT-USER-05",
            ], 500);
        }
    }

    public function Search(Request $request)
    {
        $search = $request->search_user;
        $status = $request->tab_name;
        try {

            $searchUser = User::with('role', 'designation')
                ->when($search, function ($query) use ($search) {
                    $query->where(function ($query) use ($search) {
                        return $query->where('username', 'Like', '%' .  $search . '%')
                            ->orwhere('first_name', 'Like', '%' .  $search . '%')
                            ->orwhere('email', 'Like', '%' .  $search . '%')
                            ->orWhere('last_name', 'Like', '%' .  $search . '%')
                            ->orWhereHas('role', function ($query) use ($search) {
                                return $query->where('role_name', 'Like', '%' . $search . '%');
                            })
                            ->orWhereHas('designation', function ($query) use ($search) {
                                return $query->where('designation_name', 'Like', '%' . $search . '%');
                            })
                            ->orderby('id', 'desc');
                    });
                });

            if ($status == 'activeTab') {
                $searchUser->where('is_active', 1);
            } else {
                $searchUser->where('is_active', 0);
            }
            $final = $searchUser->get();
            $search = UserResource::collection($final);
            return response()->json([
                'status'   => 'Success',
                'response' => $search,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-04\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to search the User",
                "code" => "GWT-USER-05",
            ], 500);
        }
    }

    public function activeUsers($id)
    {
        $userData = User::where('id', '=', $id)
            ->where('is_active', '=', 0)
            ->first();

        if ($userData) {
            try {
                $userAdd = User::where('id', $id)
                    ->update([
                        'is_active' => 1,
                    ]);
            } catch (Exception $e) {
                Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);

                return response()->json([
                    "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                    "error" => "Database Error",
                    "message" => "Unable to add the User",
                    "code" => "GWT-USER-09",
                ], 500);
            }
            return response()->json([
                "status" => 'Success',
                "message" => 'User has been activated successfully.',
                "response" => $userAdd,
            ], 200);
        }
    }

    public function destroy($id)
    {
        $userData = User::where('id', '=', $id)
            ->where('is_active', '=', 0)
            ->first();

        if ($userData) {
            try {
                $deleteUser = User::where('id', $id)
                    ->delete();
            } catch (Exception $e) {
                Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
                return response()->json([
                    "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                    "error" => "Database Error",
                    "message" => "Unable to delete the User",
                    "code" => "GWT-USER-10",
                ], 500);
            }
            return response()->json([
                "status" => 'Success',
                "message" => 'User has been deleted successfully.',
                "response" => $deleteUser,
            ], 200);
        } else {
            return response()->json([
                'message' => "User not found",
            ], 404);
        }
    }
}
