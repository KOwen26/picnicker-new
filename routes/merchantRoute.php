<?php

use App\Http\Controllers\Customer\CustomerFeedbackController;
use App\Http\Controllers\Merchant\MerchantsController;
use App\Http\Controllers\Merchants\ProductsController;
use App\Http\Livewire\Merchants\MerchantsRegister;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Merchant Sides
Route::prefix('merchant')->name('merchant')->group(function () {
    Route::view('/', 'pages.merchant.merchant-landing')->name('.login');
    Route::view('/register', 'pages.merchant.merchant-landing')->name('.register');
    Route::group(['middleware' => 'merchant.auth'], function () {
        Route::view('/home', 'pages.merchant.home')->name('.home');
        Route::view('/finalize', 'pages.merchant.merchant-finalize')->name('.finalize');
        Route::view('/product', 'pages.merchant.merchant-product')->name('.product');
        Route::controller(MerchantsController::class)->group(function () {
            Route::get('/transaction', 'merchantIndex')->name('.transaction');
            Route::get('/transaction-report', 'merchantReport')->name('.transaction-report');
        });
        Route::controller(CustomerFeedbackController::class)->group(function () {
            Route::get('/customer-feedback', 'merchantIndex')->name('.customer-feedback');
        });
    });
});