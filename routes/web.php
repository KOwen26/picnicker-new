<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;

// Customer
use App\Http\Controllers\Customer\CustomersController;
use App\Http\Controllers\Customer\CustomerFeedbackController;
use App\Http\Controllers\Customer\TransactionsController;
use App\Http\Controllers\Merchant\MerchantsController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Customers\CustomersLogin;
use App\Http\Livewire\Merchants\CustomersMerchantDetails;
use App\Http\Livewire\Merchants\MerchantsCustomerDetails;
use App\Http\Livewire\Others\CustomerNavbar;
use App\Http\Livewire\Transactions\CustomersTransactionsCheckout;
use App\Http\Livewire\Transactions\CustomersTransactionsConfirmation;
use App\Http\Livewire\Transactions\CustomersTransactionsDetails;

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
    Route::get('/merchant-list', [MerchantsController::class, 'customerIndex'])->name('.merchant-list');
    Route::get('/search-result/{params?}', [MerchantsController::class, 'searchIndex'])->name('.search-result');
    // Route::get('/login', [CustomersController::class, 'index'])->name('.login');
    // Route::get('/register', [CustomersController::class, 'index'])->name('.register');
    Route::get('/find/{merchant}', CustomersMerchantDetails::class)->name('.find');
    Route::middleware(['customer.auth'])->group(function () {
        Route::get('/reserve/{merchant}', CustomersTransactionsConfirmation::class)->name('.reserve');
        Route::get('/transaction', [TransactionsController::class, 'index'])->name('.transaction');
        Route::get('/transaction/{transaction}', CustomersTransactionsDetails::class)->name('.transaction-details');
    });
    Route::prefix('customer')->group(function () {
    });
});

// Route::middleware('guest')->group(function () {
//     Route::get('login', Login::class)
//         ->name('login');

//     Route::get('register', Register::class)
//         ->name('register');
// });

// Route::get('password/reset', Email::class)
//     ->name('password.request');

// Route::get('password/reset/{token}', Reset::class)
//     ->name('password.reset');

// Route::middleware('auth')->group(function () {
//     Route::get('email/verify', Verify::class)
//         ->middleware('throttle:6,1')
//         ->name('verification.notice');

//     Route::get('password/confirm', Confirm::class)
//         ->name('password.confirm');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
//         ->middleware('signed')
//         ->name('verification.verify');

//     Route::post('logout', LogoutController::class)
//         ->name('logout');
// });
