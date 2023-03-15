<?php

namespace App\Http\Controllers\api\v1;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\WaterConservationApiLogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WaterConservationApiLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $conservationCount = WaterConservationApiLogs::select('api_count', DB::raw("(DATE_FORMAT(created_at,  '%d-%m-%Y')) as date"), DB::raw("(DATE_FORMAT(created_at,  '%r')) as time"))
                ->get();
            return response()->json([
                "success" => true,
                "response" => $conservationCount
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Database Error",
                "message" => "Unable to get the water conservation api log count.",
            ], 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Search(Request $request)
    {
        $search = $request->search;
        $startDate = !empty($request->start_date) ? date('y-m-d', strtotime($request->start_date)) : null;
        $endDate = !empty($request->end_date) ? date('y-m-d', strtotime($request->end_date)) : null;
        try {
            $conservationSearch = WaterConservationApiLogs::select('api_count', DB::raw("(DATE_FORMAT(created_at,  '%d-%m-%Y')) as date"), DB::raw("(DATE_FORMAT(created_at,  '%r')) as time"))
                ->when(!empty($startDate), function ($query) use ($startDate) {
                    $query->whereDate('created_at', '>=', $startDate);
                })
                ->when(!empty($endDate), function ($query) use ($endDate) {
                    $query->whereDate('created_at', '<=', $endDate);
                })
                ->where(function ($query) use ($search) {
                    $query->where('api_count', 'Like', '%' . $search . '%')
                        ->orwhereDate("created_at", 'Like', '%' . $search . '%')
                        ->orwhereTime("created_at", 'Like', '%' . $search . '%');
                })
                ->get();
            return response()->json([
                'status' => 'Success',
                'response' => $conservationSearch,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Database Error",
                "message" => "Unable to Search the details",
            ], 500);
        }

    }

    public function filterconservationlog(Request $request)
    {
        $apiStartDate = Carbon::parse($request->start_date);
        $apiEndDate = Carbon::parse($request->end_date);
        try {
            $apiLogFilter = WaterConservationApiLogs::select(DB::raw("sum(api_count) as api_count"), DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y')) as date"), DB::raw("(DATE_FORMAT(created_at,  '%r')) as time"))
                ->whereDate('created_at', '>=', $apiStartDate)
                ->whereDate('created_at', '<=', $apiEndDate)
                ->groupBy(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"))
                ->get();

            $apiLogFilterList = WaterConservationApiLogs::select('api_count', DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y')) as date"), DB::raw("(DATE_FORMAT(created_at,  '%r')) as time"))
                ->whereDate('created_at', '>=', $apiStartDate)
                ->whereDate('created_at', '<=', $apiEndDate)
                ->get();
            $apiTotalCount = WaterConservationApiLogs::whereDate('created_at', '>=', $apiStartDate)
                ->whereDate('created_at', '<=', $apiEndDate)->sum(DB::raw('api_count'));

            if (!empty($apiLogFilter) && !empty($apiLogFilterList) && !empty($apiTotalCount)) {
                return response()->json([
                    'status' => 'Success',
                    'api_log_filter' => $apiLogFilter,
                    'api_log_filter_list' => $apiLogFilterList,
                    'api_total_count' => (int) $apiTotalCount
                ], 200);
            } else {
                return response()->json([
                    "success" => false,
                    "message" => 'No records found. There are  no records available for the date range you selected. Please modify the filter to see records.'
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => 'Error',
            ], 500);
        }
    }

}
