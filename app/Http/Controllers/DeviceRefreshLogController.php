<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Device;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use App\Helpers\DeviceLogHelper;
use App\Models\DeviceRefreshLog;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeviceRefreshLogResource;


class DeviceRefreshLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            try {

                $deviceLogData = DeviceRefreshLog::select('device_refresh_logs.id', 'device_refresh_logs.device_id', 'device_refresh_logs.keycode', 'device_refresh_logs.request_log', 'device_refresh_logs.updated_at', 'dv.name as  name')
                    ->leftjoin('devices as dv', function ($join) {
                        $join->on('device_refresh_logs.device_id', '=', 'dv.id');
                    })->orderBy('id', 'ASC')->get();

                return response()->json([
                    "success" => true,
                    "response" => $deviceLogData,

                ]);
            } catch (Exception $e) {
                Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
                return response()->json([
                    "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                    "error" => "Database Error",
                    "message" => "Unable to get the Device.",
                    "code" => "GWT-DEVICE-REFRESH-01",
                ], 500);
            }
        }

        /**
         * Store device log info in DB
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */}




    public function store()
    {
        $auth = auth()->user();
        $userId = $auth->id;

        try {

            $location = UserLocation::select('location_id')
                ->where('user_id', $userId)
                ->get();
            $locationId = array_column($location->toArray(), 'location_id');

            $deviceData = Device::select('id', 'key_code')
                ->whereIn('location_id', $locationId)
                ->get();

            if (isset($deviceData)) {
                foreach ($deviceData as $devices) {

                    $deviceId = $devices->id;
                    $keyCode = $devices->key_code;
                    $apiUrl = env('BAYWEB_API_ENDPOINT') . "?id=" . $deviceId . "&key=" . $keyCode . "&action=data";
                    $devicesData = DeviceLogHelper::deviceLog($apiUrl);
                    $responseLog = json_encode($devicesData);

                    $insert = DeviceRefreshLog::create([
                        'device_id' => $deviceId,
                        'keycode' => $keyCode,
                        'request_log' => $apiUrl,
                        'response_log' => $responseLog
                    ]);
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Log updated successfully'
                ], 200);

            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'No data found in userlocation and devices'
                ], 200);
            }

        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to update Device refreshlog",
                "code" => "GWT-DEVICE-REFRESH-02"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request)
    {
        $search = $request->search_log;

        try {

            if ($search) {
                $searchDevice = DeviceRefreshLog::select('device_refresh_logs.device_id', 'device_refresh_logs.keycode', 'device_refresh_logs.request_log', 'device_refresh_logs.updated_at', 'dv.name as name')
                    ->leftjoin('devices as dv', function ($join) {
                        $join->on('device_refresh_logs.device_id', '=', 'dv.id');
                    })->where('dv.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('device_refresh_logs.device_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('device_refresh_logs.keycode', 'LIKE', '%' . $search . '%')
                    ->orWhere('device_refresh_logs.updated_at', 'LIKE', '%' . $search . '%')
                    ->orWhere('device_refresh_logs.request_log', 'LIKE', '%' . $search . '%')->get();

                return response()->json([
                    'status' => 'success',
                    'response' => $searchDevice,
                ], 200);
            } else {
                return $this->index();
            }

        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-DEVICE-06\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to Search the details",
                "code" => "GWT-DEVICE-REFRESH-03",
            ], 500);
        }
    }


    /**
     * Show specific device refresh log
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $deviceLog = DeviceRefreshLog::select('device_refresh_logs.device_id', 'device_refresh_logs.keycode', 'device_refresh_logs.request_log', 'device_refresh_logs.response_log', 'device_refresh_logs.updated_at', 'dv.name as  name')
                ->leftjoin('devices as dv', function ($join) {
                    $join->on('device_refresh_logs.device_id', '=', 'dv.id');
                })
                ->where('device_refresh_logs.id', $id)->first();

            return response()->json([
                "status" => 'success',
                "message" => "Device Refresh log fetched successfully",
                "response" => $deviceLog,

            ]);

        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-DEVICE-06\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to show the details",
                "code" => "GWT-DEVICE-REFRESH-04",
            ], 500);

        }
    }
}
