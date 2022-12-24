<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\restApi;

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

Route::get('data', [restApi::class,'index']);
Route::get('data/{id}', [restApi::class,'show']);
Route::post('data', [restApi::class,'store']);
Route::put('data/{id}', [restApi::class,'update']);
Route::delete('data/{id}', [restApi::class,'destroy']);