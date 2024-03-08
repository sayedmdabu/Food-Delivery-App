<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RiderInfoAPI, RestaurantDeistance};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    Route::controller(RiderInfoAPI::class)->group(function () {
        Route::post('rider-info', 'riderInfo');
    });

    Route::controller(RestaurantDeistance::class)->group(function () {
        Route::post('rider-deistance', 'deistance');
    });
});
