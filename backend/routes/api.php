<?php

use App\Http\Controllers\LendingController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/lending',[LendingController::class, 'lending'])->name('lending');
    //return response()->json([ 'status' => 200, 'message' => "EEEE Backend is work!" ]);
    //return response()->api(['status' => 200, $request->all()]);


