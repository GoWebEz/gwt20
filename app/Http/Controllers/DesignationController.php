<?php


namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Http\Resources\DesignationResource;
use App\Models\Role;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $designationData=Designation::with('role');
            $activeDesignation = $designationData->where('is_active',  1)->paginate(2);
            $inActiveDesignation = $designationData->where('is_active',  0)->paginate(2);
            $designationDetails['active'] = $activeDesignation;
            $designationDetails['in_active'] = $inActiveDesignation;
            return view('admin.designation',['designationDetails' => $designationDetails]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to get the Designation.",
                "code" => "GWT-DESIGNATION-01",
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
            'code' => 'required|unique:designations',
            'name' => 'required|unique:designations',
            'role' => 'required',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
            $designationData = $validator->validated();
            $roleName = $request->role_name;
            $role = Role::select('id')->where('role_name', $roleName)->first();
            $designationData['roles_id'] = $role->id;

            $designationRecord = Designation::create($designationData);
            $designationData = Designation::where('id', $designationRecord->id)->get();
            $designationDetail = DesignationResource::collection($designationData);
            return response()->json([
                "success" => true,
                "message" => "Designation has been added successfully.",
                "data" => $designationDetail,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-Designation-02\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to insert the designation",
                "code" => "GWT-DESIGNATION-02",
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
            $designationData = Designation::with('role')->where('id', $id)->get();
            $designationDetail = DesignationResource::collection($designationData);

            return response()->json([
                'status' => 'success',
                'response' => $designationDetail,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable edit the designation details.",
                "code" => "GWT-DESIGNATION-03",
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
            'code' => 'required|unique:designations,designation_code,' . $id,
            'name' => 'required|unique:designations,designation_name,' . $id,
            'role_name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $role = Role::select('id')->where('role_name', $request->role_name)->get();
            foreach ($role as $roles) {
                $id = $roles->id;
            }
            $designationUpdate = Designation::where('id', $id)
                ->update([
                    'code' => $request->designation_code,
                    'name' => $request->designation_name,
                    'role_id' => $id,
                ]);
            $designationData = Designation::with('role')->where('id', $id)->get();
            $designationDetail = DesignationResource::collection($designationData);
            return response()->json([
                "success" => true,
                "message" => "Designation updated successfully.",
                "data" => $designationDetail,
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: <GWT-Designation-04></GWT-ROLES-04>\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "error" => "Database Error",
                "message" => "Unable to update the designation details",
                "Code" => "GWT-DESIGNATION-04",
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $designationInactive = User::where('designation_id', $id)->where('is_Active', 0)->get()->toArray();

            if ($designationInactive) {

                return response()->json([
                    'message' => "is connected with the user. To inactivate, please remove this designation from the user.",
                    'response' => "False",
                ], 200);
            } else {
                return response()->json([
                    'message' => "Allow to inactive the designation.",
                    'response' => "True",
                ], 200);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);

            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "unable to inactivate.",
                "code" => "GWT-LOCATION-05",
            ], 500);
        }
        return response()->json([
            "status" => 'Success',
            "message" => 'Designation has been inactivated successfully.',
            "response" => True,
        ], 200);
    }



    /**
     * Activate designation from inactive.
     *
     * @param  int  $id
     */

    public function activateDesignation($id)
    {
        $designationActive = Designation::where('id', $id)
            ->where('is_Active', '0')
            ->first();

        if ($designationActive) {
            try {
                $designationAdd = Designation::where('id', $id)
                    ->update([
                        'is_Active' => '1',
                    ]);
                return response()->json([
                    "status" => 'Success',
                    "message" => 'Designation has been activated successfully.',
                    "response" => $designationAdd,
                ], 200);

            } catch (Exception $e) {
                Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);

                return response()->json([
                    "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                    "error" => "Database Error",
                    "message" => "Unable to active the designation",
                    "code" => "GWT-DESIGNATION-07",
                ], 500);
            }

        }
    }

    /**
     * Permanently delete the designation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteDesignation($id)
    {
        $designationInactive = Designation::where('id', $id)
            ->where('is_Active', '0')
            ->first();

        if ($designationInactive) {

            try {
                $designationDelete = Designation::where('id', $id)
                    ->delete();
                return response()->json([
                    "status" => 'Success',
                    "message" => 'Designation has been permanently deleted.',
                    "response" => $designationDelete,
                ], 200);

            } catch (Exception $e) {
                Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
                return response()->json([
                    "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                    "error" => "Database Error",
                    "message" => "Unable to permanently delete the designation",
                    "code" => "GWT-DESIGNATION-08",
                ], 500);
            }

        } else {
            return response()->json([
                'message' => "Designation not found",
            ], 404);
        }
    }

    /**
     * Search Designation details from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function Search(Request $request)
    {
        $search = $request->search_designation;
        $status = $request->tab_name;
        try {

            $searchDesignation = Designation::with('role')
                ->when($search, function ($query) use ($search) {
                    $query->where(
                        function ($query) use ($search) {
                                return $query->where('designation_code', 'Like', '%' . $search . '%')
                                    ->orwhere('designation_name', 'Like', '%' . $search . '%')
                                    ->orWhereHas(
                                        'role',
                                        function ($query) use ($search) {
                                                        return $query->where('role_name', 'Like', '%' . $search . '%');
                                                    }
                                    )
                                    ->orderby('id', 'desc');
                            }
                    );
                });

            if ($status == 'activeTab') {
                $searchDesignation->where('is_Active', '1');

            } else {
                $searchDesignation->where('is_Active', '0');
            }
            $final = $searchDesignation->get();
            $search = DesignationResource::collection($final);

            return response()->json([
                'status' => 'Success',
                'response' => $search,
            ], 200);

        } catch (Exception $e) {
            Log::error($e->getMessage() . "\nTrace:\n#0Code: GWT-04\n#1File:" . __FILE__ . "\n#3Line:" . __LINE__ . "\n#4Request: " . print_r($request->all(), true));
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error" => "Database Error",
                "message" => "Unable to search the designation details",
                "code" => "GWT-USER-05",
            ], 500);
        }
    }
}
