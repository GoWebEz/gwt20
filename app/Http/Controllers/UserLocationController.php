<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserLocationResource;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $userLocationData = User::with('userlocation')->whereHas('userlocation')->get();

            $collection = collect($userLocationData);
            $activeUser = $collection->filter(function ($value, $key) {

                return $value->userlocation[0]->is_active_user_location == 1;
            });

            $inActiveUser = $collection->filter(function ($value, $key) {

                return $value->userlocation[0]->is_active_user_location == 0;
            });

            $locationDetails['active'] = UserLocationResource::collection($activeUser);
            $locationDetails['in_active'] = UserLocationResource::collection($inActiveUser);

            return response()->json([
                'status'      => 'success',
                'response'    => $locationDetails,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "Unable to get the user location.",
                "code"      => "GWT-USERLocation-01"
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
            'user_id'     => 'required',
            'location_id' => 'required',
        ];

        $locations = $request->location_id;
        $user_id = $request->user_id;
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        try {

            $location_insert  = $validator->validated();
            foreach ($locations as $location) {

                $location = UserLocation::create([
                    'user_id'     => $user_id,
                    'location_id' => $location
                ]);
            }
            $locationDetails = User::with('userlocation')->where('id', $user_id)->get();

            $userLocationDetails = UserLocationResource::collection($locationDetails);

            return response()->json([
                "success" => true,
                "message" => "User location has been added successfully.",
                "data"    => $userLocationDetails

            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-USERLOCATION-02\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "Unable to insert Userlocation",
                "code"      => "GWT-USERLOCATION-02"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
            // dd('dbhvdh');
            $userData = User::selectRaw("CONCAT(lc.code,' ','(',cg.name,')') AS locations.code,lc.id,lc.name,users.id,users.user_name,ul.location_id")
                ->leftJoin(
                    'user_location  as ul',
                    'users.id',
                    '=',
                    'ul.user_id'
                )
                ->leftJoin(
                    'locations as lc',
                    'ul.location_id',
                    '=',
                    'lc.id'
                )
                ->leftJoin(
                    'categories as cg',
                    'lc.category_id',
                    '=',
                    'cg.id'
                )->where('users.id', $id)->get();

            $collection = collect($userData)->pluck('location_id')->toArray();

            $userLocationDetails =  [
                'code' => $userData->pluck('code')->toArray(),
                'name' => $userData->pluck('name')->toArray(),
                'location_id' => $userData->pluck('location_id')->toArray(),
                'id' => $userData->pluck('id')->toArray()[0],
                'username' => $userData->pluck('username')->toArray()[0]
            ];


            $unselectedLocation = Location::selectRaw("CONCAT(locations.code,' ','(',cg.name,')') AS locations.code,locations.id,locations.name")
                ->leftJoin('categories as cg', 'locations.category_id', '=', 'cg.id')
                ->whereNotIn('locations.id', $collection)->where('locations.is_active', 1)->orderBy('locations.code', 'ASC')->get()->toArray();

            return response()->json([
                'status'     => 'success',
                'response'   => $userLocationDetails,
                'unselected' => $unselectedLocation
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "Unable to edit the user location",
                "code"      => "GWT-USERLOCATION-03"
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
            'location_id'  => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        try {

            $location_id = $request->location_id;
            $update     = User::find($id)->userlocation()->sync($location_id);

            $userLocation = User::with('userlocation')->where('id', $id)->get();
            $userLocationDetails = UserLocationResource::collection($userLocation);

            return response()->json([
                "success"  => true,
                "message"  => "User location has been updated successfully",
                "response" => $userLocationDetails
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-USER-02\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "error"     => "Database Error",
                "message"   => "Unable to update the user location details. Code:  GWT-USERLocation-04",
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inActivateLocation($id)
    {
        try {
            $deleteLocationData = UserLocation::where('user_id', $id)
                ->update([
                    'is_active'     => 0,
                ]);
            return response()->json([
                "status"     => 'Success',
                "message"    => 'User location has been inactivated successfully.',
                "response"   =>  $deleteLocationData
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);

            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "Unable to inactivate the user location",
                "code"      => "GWT-USERLocation-05"
            ], 500);
        }
    }

    public function getUserLocationDetails(Request $request)
    {
        try {

            $userlocation = UserLocation::select('user_id')->distinct()->get();
            $user       = User::select('user_name', 'id')->where('del_flag', 'N')->whereNotIn('id', $userlocation)->get();
            $location   = Category::selectRaw("CONCAT(lc.location_code,' ','(',category_name,')') AS location_code,lc.id")
                ->leftjoin('locations as lc', function ($join) {
                    $join->on('categories.id', '=', 'lc.category_id');
                })
                ->where('del_flag', 'N')->orderBy('location_code', 'ASC')->get();
            return response()->json([
                'status'        => 'success',
                'user_name'     => $user,
                'location_code' => $location,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-USERLOCATION-05\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"   => "Database Error",
                "message" => "Unable to get user location details",
                "code"    => "GWT-USERLOCATION-05",
            ], 500);
        }
    }
}
