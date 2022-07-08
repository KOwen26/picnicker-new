<?php

// Customer
use App\Http\Controllers\Customer\CustomersController;
use App\Http\Controllers\Customer\CustomerFeedbackController;

// Merchant
use App\Http\Controllers\Merchant\MerchantsController;
// use App\Http\Controllers\Merchant\MerchantOwnerController;
// use App\Http\Controllers\Merchant\MerchantTypeController;
// use App\Http\Controllers\Merchant\MerchantFacilitiesController;
// use App\Http\Controllers\Merchant\MerchantBankAccountsController;


// Admin
use App\Http\Controllers\Admin\BanksController;
use App\Http\Controllers\Admin\CitiesController;
// use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\FacilitiesController;
// use App\Http\Controllers\Admin\ProvincesController;

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

// Route::domain('dev.localhost')->group(function () {
//     Route::view('/', 'pages.admin.home');
// });

// Admin Sides
// Route::view('/admin', 'pages.admin.home')->name('home');
Route::prefix('admin')->name('admin')->group(function () {
    Route::view('/login', 'pages.admin.admin-landing')->name('.login');
    // Transaction
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::view('/', 'pages.admin.home')->name('.home');
        // Customer
        Route::get('/customer', [CustomersController::class, 'adminIndex'])->name('.customer');
        Route::get('/customer_feedback', [CustomerFeedbackController::class, 'index'])->name('.customer_feedback');
        // Merchant
        Route::get('/merchant', [MerchantsController::class, 'adminIndex'])->name('.merchant');
        // Route::get('/merchant_tickets', [MerchantTicketsController::class, 'adminIndex'])->name('.merchant_tickets');
        Route::get('/facilities', [FacilitiesController::class, 'index'])->name('.facilities');
        // General
        Route::controller(EmployeesController::class)->name(".employee")->group(function () {
            Route::get('/employee',  'index');
            // Route::get('/employee/details/{id}',  'edit')->name('.details');
            // Route::post('/employee/store',  'store')->name('.store');
            // Route::put('/employee/update/{id}',  'update')->name('.update');
            // Route::delete('/employee/delete/{id}',  'destroy')->name('.delete');
        });

        Route::get('/cities', [CitiesController::class, 'index'])->name('.cities');
        Route::get('/bank', [BanksController::class, 'index'])->name('.banks');
    });
});