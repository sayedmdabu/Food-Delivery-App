<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiderInfo;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RiderInfoAPI extends Controller
{
    public function riderInfo(Request $request)
    {

        // dd(now());
        // dd($request->capture_time->toDateTimeString());
        try{
            $data = RiderInfo::create([
                'service_name' => "Food delivery",
                'rider_id' => $request->rider_id,
                'lat' => $request->lat,
                'long' => $request->long,
                'capture_time' => $request->capture_time,
                // 'capture_time' => now(),
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                ], 404);
            }

        }catch (QueryException $e){
            $error = $e->getMessage();

            return \response()->json([
                'error' => $error,
                'status_code' => 500
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
