<?php

namespace App\Http\Controllers;

use App\Helpers\DeviceLogHelper;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\GlobalSetting;
use App\Models\Location;
use App\Models\BaywebActivity;
use App\Models\ModeSetpointLog;
use App\Models\User;
use App\Models\UserLocation;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class BaywebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth()->user();
        $userId = $auth->id;

        try {
            $location = User::find($userId)->userMultiLocation()->get();

            $locationData = Location::select('locations.code', 'states.time_zone')->leftjoin('states', 'states.id', '=', 'locations.state')->where('locations.category_id', 1)->get();
            // dd($locationData);

            $locationDetails = collect($location);
            $locationResult = $locationDetails->filter(function ($value, $key) use ($locationData) {
                foreach ($locationData as $timeZone) {
                    if ($value['code'] == $timeZone['code']) {
                        $value['time_zone'] = $timeZone['time_zone'];
                    }
                }
                return $value;
            });

            $locationResult->all();
            if (($location)->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'response' => 'There are no locations connected to you. Please contact admin to add a location to you.',
                ], 200);
            } else {
                return view('pages.energymanagement', compact("locationData"));
                // return response()->json([
                //     'status' => true,
                //     'response' => $location_result,
                // ], 200);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to get the device details",
                "code" => "GWT-DEVICE-REFRESH-02",
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $locationId = $request->location;

        $locationData = Location::leftjoin('state', 'state.id', '=', 'locations.state')
            ->select('state.time_zone')
            ->where('locations.id', $locationId)
            ->where('locations.category_id', 1)->get();


        try {

            if (count($locationData) > 0) {
                $userId = auth()->user()->id;
                $timeZone = $locationData[0]['time_zone'];
                // $locationId = UserLocation::whereIn('user_id', [$userId])->pluck('location_id');
                // $locationId = $request->location;

                $deviceData = Device::select('id', 'key_code', 'name', 'location_id')->where('is_active', '1')
                    ->where('location_id', $locationId)
                    ->get();
                $baywebDetails = [];

                if (count($deviceData) == 0) {
                    return response()->json([
                        'status' => 'success',
                        'response' => $locationData,
                        'count' => 0

                    ], 200);
                }

                foreach ($deviceData as $devices) {

                    $deviceId = $devices->id;
                    $keyCode = $devices->key_code;
                    $deviceName = $devices->name;
                    $locationId = $devices->location_id;
                    $apiUrl = env('BAYWEB_API_ENDPOINT') . "?id=" . $deviceId . "&key=" . $keyCode . "&action=data";
                    $deviceApiData = DeviceLogHelper::deviceLog($apiUrl);

                    $baywebOat = isset($deviceApiData['oat']) ? $deviceApiData['oat'] : 'NA';
                    $baywebOah = isset($deviceApiData['oah']) ? $deviceApiData['oah'] : 'NA';
                    $baywebIat = isset($deviceApiData['iat']) ? $deviceApiData['iat'] : 'NA';
                    $baywebAct = isset($deviceApiData['act']) ? $deviceApiData['act'] : 'NA';
                    $baywebIn1 = isset($deviceApiData['in1']) ? $deviceApiData['in1'] : 'NA';
                    $baywebSetPoint = isset($deviceApiData['sp']) ? $deviceApiData['sp'] : 'NA';
                    $baywebMode = isset($deviceApiData['mode']) ? $deviceApiData['mode'] : 'NA';

                    $baywebModeType = ($baywebMode === 1) ? 'heat_sp' : (($baywebMode === 2) ? 'cool_sp' : 'NA');

                    $key = GlobalSetting::pluck('value', 'key');

                    $baywebData = BaywebActivity::select('current_activity')->where('activity_code', $baywebAct)->get();
                    foreach ($baywebData as $data) {
                        $baywebAct = $data->current_activity;
                    }
                    $status = Device::select('mode', 'setpoint')->where('id', $deviceId)->first();
                    $futureMode = $status['mode'] ?? '';
                    $futureSetPoint = $status['setpoint'] ?? '';
                    $pending = false;
                    if ($baywebSetPoint != $futureSetPoint || $baywebMode != $futureMode) {
                        $pending = true;
                    }

                    $baywebDetails[] = [
                        'device_name' => $deviceName,
                        'location_id' => $locationId,
                        'device_id' => $deviceId,
                        'key_code' => $keyCode,
                        'inside' => $baywebIat,
                        'activity' => $baywebAct,
                        'supply' => $baywebIn1,
                        'bayweb_mode' => $baywebModeType,
                        'setpoint' => $baywebSetPoint,
                        'oat' => $baywebOat,
                        'oah' => $baywebOah,
                        'global_value' => $key,
                        'pending' => $pending,
                        'time_zone' => $timeZone
                    ];
                }

                return response()->json([
                    'status' => 'success',
                    'message' => 'Success',
                    'response' => $baywebDetails,
                    'count' => 1,

                ], 200);
            }

        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to insert Device refreshlog",
                "code" => "GWT-DEVICE-REFRESH-02",
            ], 500);
        }
    }

    public function bayweb(Request $request)
    {
        $userId = auth()->user()->id;

        $locationId = $request->location_id;
        $mode = $request->mode;
        $baywebIat = $request->iat;
        $deviceId = $request->device_id;
        $keyCode = $request->key_code;
        $activity = $request->activity;
        $previousMode = $request->bayweb_mode;
        $baywebSetPoint = $request->setpoint;

        if ($mode == 'heat_sp') {
            $baywebMode = 1;
        } else if ($mode == 'cool_sp') {
            $baywebMode = 2;
        } else {
            $baywebMode = 0;
        }
        if ($previousMode == 'heat_sp') {
            $previousModeId = 1;
        } else if ($previousMode == 'cool_sp') {
            $previousModeId = 2;
        } else {
            $previousModeId = 0;
        }

        $url = env('BAYWEB_API_ENDPOINT') . "?id=" . $deviceId . "&key=" . $keyCode . "&action=set&mode=" . $baywebMode;
        $devicesLog = DeviceLogHelper::deviceLog($url);

        if ($devicesLog) {

            $deviceUrl = env('BAYWEB_API_ENDPOINT') . "?id=" . $deviceId . "&key=" . $keyCode . "&action=set&" . $mode . "=" . $baywebSetPoint;
            $baywebDevices = DeviceLogHelper::deviceLog($deviceUrl);
            $responseLog = json_encode($baywebDevices);

            $update = Device::where('id', $deviceId)
                ->update([
                    'future_mode' => $baywebMode,
                    'future_setpoint' => $baywebSetPoint,
                ]);

            $insert = ModeSetpointLog::create([
                'device_id' => $deviceId,
                'location_id' => $locationId,
                'previous_mode' => $previousModeId,
                'current_mode' => $baywebMode,
                'previous_setpoint' => $baywebIat,
                'current_setpoint' => $baywebSetPoint,
                'request_log' => $url,
                'response_log' => $responseLog,
                'updated_by' => $userId,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Success',
        ], 200);
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */

}
