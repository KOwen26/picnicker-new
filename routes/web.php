<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;

// Customer
use App\Http\Controllers\Customer\CustomersController;
use App\Http\Controllers\Customer\CustomerFeedbackController;

// Merchant
use App\Http\Controllers\Merchant\MerchantsController;
// use App\Http\Controllers\Merchant\MerchantOwnerController;
// use App\Http\Controllers\Merchant\MerchantTypeController;
use App\Http\Controllers\Merchant\MerchantTicketsController;
// use App\Http\Controllers\Merchant\MerchantFacilitiesController;
// use App\Http\Controllers\Merchant\MerchantBankAccountsController;


// Admin
use App\Http\Controllers\Admin\BanksController;
use App\Http\Controllers\Admin\CitiesController;
// use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\FacilitiesController;
// use App\Http\Controllers\Admin\ProvincesController;
// use App\Http\Controllers\Admin\TicketCategoriesController;


use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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


// Customer Sides
Route::name('customer')->group(function () {
    Route::get('/', [CustomersController::class, 'index'])->name('.home');
    Route::prefix('customer')->group(function () {
    });
});


// Merchant Sides
Route::prefix('merchant')->name('merchant')->group(function () {
});


// Admin Sides
// Route::view('/admin', 'pages.admin.home')->name('home');
// Route::prefix('admin')->name('admin')->group(function () {
//     Route::view('/', 'pages.admin.home')->name('.home');
//     // Transaction

//     // Customer
//     Route::get('/customer', [CustomersController::class, 'adminIndex'])->name('.customer');
//     Route::get('/customer_feedback', [CustomerFeedbackController::class, 'index'])->name('.customer_feedback');
//     // Merchant
//     Route::get('/merchant', [MerchantsController::class, 'adminIndex'])->name('.merchant');
//     Route::get('/merchant_tickets', [MerchantTicketsController::class, 'adminIndex'])->name('.merchant_tickets');
//     Route::get('/facilities', [FacilitiesController::class, 'index'])->name('.facilities');
//     // General
//     Route::get('/employee', [EmployeesController::class, 'index'])->name('.employee');
//     Route::get('/cities', [CitiesController::class, 'index'])->name('.cities');
//     Route::get('/bank', [BanksController::class, 'index'])->name('.bank');
// });



Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});