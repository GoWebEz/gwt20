<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\ClientLocation;
use App\Models\Client;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\support\Facades\Log;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $activeClient = Client::where('is_active', 1)->paginate(1);
            $inactiveClient = Client::where('is_active',  0)->paginate(1);
            $clientDetails['active'] = $activeClient;
            $clientDetails['in_active'] = $inactiveClient;
            return view('pages.client', ['client_details' => $clientDetails]);
        } catch (Exception $e) {
            return response()->json([
                "timestamp"     => Carbon::now('UTC')->toDateTimeString(),
                "error"         => "Database Error",
                "message"       => "Unable to get the client details.",
                "code"          => "GWT-DESIGNATION-01",
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
    { {
            $rules = [
                'name'                  => 'required|unique:clients',
                'opening_hour'          => 'nullable',
                'startup_hour'          => 'nullable',
                'closing_hour'          => 'nullable',
                'shutdown_hour'         => 'nullable',
                'measurement'           => 'nullable',
                'cost_per_measurement'  => 'nullable',
            ];
            $message = [
                'required_if' => 'The :attribute field is required.'
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 422);
            }
            try {
                $client[] = Client::create([
                    'name'                  => $request->name,
                    'opening_hour'          => $request->opening_hour,
                    'startup_hour'          => $request->startup_hour,
                    'closing_hour'          => $request->closing_hour,
                    'shutdown_hour'         => $request->shutdown_hour,
                    'measurement'           => $request->measurement,
                    'cost_per_measurement'  => $request->cost_per_measurement,
                ]);
                return response()->json([
                    "success"  => true,
                    "message"  => "Client datas has been added successfully.",
                    "response" => $client,
                ]);
            } catch (Exception $e) {
                return response()->json([
                    "timestamp"     => Carbon::now('UTC')->toDateTimeString(),
                    "error"         => "Database Error",
                    "message"       => "Unable to insert Client datas",
                ], 500);
            }
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
            $clientData = Client::where('id', $id)->get();

            return response()->json([
                'status'   => true,
                'response' => $clientData,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "Unable to edit the Client",
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
            'name'                  => 'required',
            'opening_hour'          => 'nullable',
            'startup_hour'          => 'nullable',
            'closing_hour'          => 'nullable',
            'shutdown_hour'         => 'nullable',
            'measurement'           => 'nullable',
            'cost_per_measurement'  => 'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }
        try {

            $updateClientDetails = Client::where('id', $id)
                ->update([
                    'name'                      => $request->name,
                    'startup_hour'              => $request->startup_hour,
                    'opening_hour'              => $request->opening_hour,
                    'closing_hour'              => $request->closing_hour,
                    'shutdown_hour'             => $request->shutdown_hour,
                    'measurement'               => $request->measurement,
                    'cost_per_measurement'      => $request->cost_per_measurement,
                ]);
            $clientDetails = Client::where('id', $id)->get();
            return response()->json([
                "success"   => true,
                "message"   => "Client has been updated successfully.",
                "response"  => $clientDetails,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error"   => "Database Error",
                "message" => "Unable to update the Client details.",
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function InactiveStatus($id)
    {
        try {
            $clientLocation = ClientLocation::where('client_id', $id)
                ->leftjoin('locations as lc', function ($join) {
                    $join->on('lc.id', '=', 'client_location.location_id');
                })->where('lc.is_active', 1)
                ->first();

            if ($clientLocation) {
                return response()->json([
                    'message'  => "is connected with some locations. To inactivate, please remove this client from the connected locations.",
                    'response' => "False",
                ], 200);
            } else {
                return response()->json([
                    'message'  => "Allow to inactive the client.",
                    'response' => "True",
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "error"   => "Database Error",
                "message" => "Unable to inactivate the Client details.",
            ], 500);
        }
    }
    public function inActivateClients($id)
    {
        try {
            $inactiveClient = Client::where('id', $id)
                ->update([
                    'is_active' => 0 ,
                ]);
            return response()->json([
                'message'  => "client has been inactivated successfully",
                'response' => $inactiveClient,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error"     => "Database Error",
                "message"   => "This client is connected to a location. To inactivate, please remove the client from the location.",
            ], 500);
        }
    }

    public function activateClient($id)
    {
        $clientData = Client::where('id', $id)
            ->where('is_active', '=', '1')
            ->first();
        if ($clientData) {
            try {
                $activeClient = Client::where('id', $id)
                    ->update([
                        'is_active' => '0',
                    ]);
            } catch (Exception $e) {
                Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);

                return response()->json([
                    "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                    "error" => "Database Error",
                    "message" => "Unable to activate the Client",
                ], 500);
            }
            return response()->json([
                "status" => 'Success',
                "message" => 'Client has been activated successfully.',
                "response" => $activeClient,
            ], 200);
        } else {
            return response()->json([
                'message' => "client not found",
            ], 404);
        }
    }

    public function destroy($id)
    {
        $clientData = Client::where('id', $id)
            ->where('is_active', 0)
            ->first();
        if ($clientData) {
            try {
            $deleteClient = Client::where('id', $id)
                                        ->delete();
                    return response()->json([
                        "status" => 'Success',
                        "message" => 'client has been deleted successfully.',
                        "response" => $deleteClient,
                    ], 200);
            } catch (Exception $e) {
                return response()->json([
                    "timestamp"     => Carbon::now('UTC')->toDateTimeString(),
                    "error"         => "Database Error",
                    "message"        => "Unable to delete the client",
                ], 500);
            }
        } else {
            return response()->json([
                'message' => "client not found",
            ], 404);
        }
    }

    public function Search(Request $request)
    {
        $search = $request->search_client;
        $status = $request->tab_name;
        try {

                $searchClient = Client::where(function($query) use($search){
                    return $query->where('name', 'Like', '%' .  $search. '%')
                                ->orwhere('opening_hour', 'Like', '%' .  $search . '%')
                                ->orwhere('startup_hour', 'Like', '%' .  $search . '%')
                                ->orwhere('closing_hour', 'Like', '%' .  $search . '%')
                                ->orwhere('shutdown_hour', 'Like', '%' .  $search . '%')
                                ->orwhere('measurement', 'Like', '%' .  $search . '%')
                                ->orwhere('cost_per_measurement', 'Like', '%' .  $search . '%')
                                ->orderby('id', 'desc')->first();
                });

            if($status == 'activeTab') {
                $searchClient->where('is_active', 1);
            }else{
                $searchClient->where('is_active', 0);
            }
            $final = $searchClient->get();
            $search = ClientResource::collection($final);
            return response()->json([
                'status' => 'Success',
                'response' => $search,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to Search the details",
            ], 500);
        }

    }
}
