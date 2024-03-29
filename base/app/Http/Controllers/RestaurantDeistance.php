<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RestaurantInfo;
use App\Models\RiderInfo;

class RestaurantDeistance extends Controller
{
    public function deistance(Request $request){

        $restaurant = RestaurantInfo::where('restaurant_id',$request->input('restaurant_id'))->first();


        $nearestRiders = RiderInfo::select('*',
                DB::raw('(6371 * acos(cos(radians(' . $restaurant->lat . '))
                * cos(radians(`lat`))
                * cos(radians(`long`) - radians(' . $restaurant->long . '))
                + sin(radians(' . $restaurant->lat . '))
                * sin(radians(`lat`)))) AS distance'))
                ->having('distance', '<', 5)
                ->orderBy('distance')
                ->get();

        if ($nearestRiders) {
            return response()->json([
                'success' => true,
                'message' => $nearestRiders
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No rider found within 5 minutes'
            ], 404);
        }

    }
}
