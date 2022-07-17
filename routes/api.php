<?php

use App\Http\Controllers\Merchant\MerchantsController;
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

Route::prefix('v1')->group(function () {
    Route::prefix('/merchants')->group(function () {
        Route::controller(MerchantsController::class)->group(function () {
            Route::get('/all', 'apiIndex');
            Route::get('/all/{params}', 'apiSearch');
            Route::get('/details/{id}', 'apiShow');
        });
    });
});