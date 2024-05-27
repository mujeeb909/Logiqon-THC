<?php

use App\Services\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HubspotApiController;



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


Route::get('/us-clear', function () {

    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Cleared!";
});




Route::get('setTheme', [Settings::class, 'setTheme']);
Route::get('logout', [AuthController::class, 'logout']);



Route::get('/', function () {
    return view('landing');
});


Route::middleware([AlreadyLoggedIn::class])->group(function () {


    // Route::get('/authentication-signup', function () {
    //     return view('authentication.authentication-signup');
    // });


    Route::post('register', [AuthController::class, 'store']);
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::get('verify-account', [AuthController::class, 'verifyAccount'])->name('verify-account');
    Route::get('resend-verify-account', [AuthController::class, 'verifyOTPAccount'])->name('resend-verify-account');
    Route::post('verify-account', [AuthController::class, 'accountVerification'])->name('verify-account');
    Route::get('authentication-forgot-password', [AuthController::class, 'passwordForgotForm'])->name('authentication-forgot-password');
    Route::post('/password/forgot', [AuthController::class, 'sendResetLink'])->name('forgot.password.link');
    Route::get('/password-reset-{token}', [AuthController::class, 'showResetForm'])->name('reset.password.form');
    Route::post('password-reset', [AuthController::class, 'passwordRest'])->name('passowrd.rest');
    Route::get('/signup', [AuthController::class, 'register']);
    Route::post('/authentication-signup', [AuthController::class, 'login']);
    Route::post('adminlogin', [AuthController::class, 'adminlogin']);
    Route::post('register', [AuthController::class, 'store']);

});

Route::get('{username}', [ProfileController::class, 'index'])->name('public-profile');


//---------------------------------------------Admin Routes -------------------------------------
Route::middleware([Admin::class])->group(function () {

    Route::get('exportUsers', [DashboardController::class, 'exportUsers'])->name('exportUsers');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('purchase-plan', [DashboardController::class, 'purchasePlan'])->name('purchase-plan');

    Route::get('showCategories', [CategoryController::class, 'index']);

    Route::post('storeCategories', [CategoryController::class, 'store']);

    Route::get('contacts', [ProductController::class, 'contactPage'])->name('contacts');

    Route::post('saveProducts', [ProductController::class, 'store'])->name('saveProducts');
    Route::post('/deleteSelectedRows', [ProductController::class, 'deleteSelectedRows'])->name('deleteSelectedRows');

    Route::get('plans', [ProductController::class, 'index'])->name('plans');

    Route::post('payment', [StripeController::class, 'makePayment'])->name('payment');
    Route::get('success', [StripeController::class, 'success'])->name('success');
    Route::get('cancel', [StripeController::class, 'cancel'])->name('cancel');
    Route::get('products-search', [ProductController::class, 'search'])->name('searchProducts');

    Route::get('setting-change-password', [ProductController::class, 'changePassword'])->name('setting-change-password');
    Route::post('validate-current-password', [ProductController::class, 'validateCurrentPassword'])->name('validateCurrentPassword');

    Route::get('profile-page', [ProductController::class, 'profilePage'])->name('profile-page');

    Route::get('terms-conditions', [DashboardController::class, 'showTConditions'])->name('terms-conditions');
    Route::get('privacy-policy', [DashboardController::class, 'showPPolicy'])->name('privacy-policy');
    Route::get('delete-account', [DashboardController::class, 'deleteAccount'])->name('delete-account');


});


// Route::get('addme-profile', [ProfileController::class, 'index'])->name('addmeprofile');





