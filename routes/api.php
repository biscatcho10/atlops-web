<?php

use Illuminate\Http\Request;
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

Route::group(['middleware' => 'auth'], function ($router) {
    
});

Route::post('order/sort', [\App\Http\Controllers\Api\OrderController::class, 'filterOrder']);
Route::post('order/arrange', [\App\Http\Controllers\Api\OrderController::class, 'arrangeOrder']);
Route::post('order/country', [\App\Http\Controllers\Api\OrderController::class, 'countryOrder']);
Route::post('order/town', [\App\Http\Controllers\Api\OrderController::class, 'townOrder']);

Route::post('companyOrder/sort', [\App\Http\Controllers\Api\CompanyOrderController::class, 'filterOrder']);
Route::post('companyOrder/arrange', [\App\Http\Controllers\Api\CompanyOrderController::class, 'arrangeOrder']);
Route::post('companyOrder/country', [\App\Http\Controllers\Api\CompanyOrderController::class, 'countryOrder']);
Route::post('companyOrder/town', [\App\Http\Controllers\Api\CompanyOrderController::class, 'townOrder']);




Route::post('order/removefromwishlist', [\App\Http\Controllers\Api\OrderController::class, 'removefromwishlist']);
Route::post('order/getlovedorder', [\App\Http\Controllers\Api\OrderController::class, 'getlovedorder']);
Route::post('order/addtowishlist', [\App\Http\Controllers\Api\OrderController::class, 'addtowishlist']); 

Route::post('order/comment', [\App\Http\Controllers\Api\OrderController::class, 'orderComment']);
Route::post('order/replyComment', [\App\Http\Controllers\Api\OrderController::class, 'replyComment']);