<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarInventoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarTypesController;
use App\Http\Controllers\ExtrasController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PayMethodController;
use App\Http\Controllers\FuelTypeController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\RentalSettingController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;

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

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/loginSubmit',[AdminController::class,'login_submit']);

Route::group(['middleware' => 'admin'], function () { 
	
	Route::get('admin/logout',function(){
		session()->forget('admin');
		return redirect('admin');
	});
	
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
	Route::resource('admin/carInventory',CarInventoryController::class);
	Route::resource('admin/bookings',BookingController::class);
	Route::resource('admin/carTypes',CarTypesController::class);
	Route::resource('admin/extras',ExtrasController::class);
	Route::resource('admin/locations',LocationController::class);
    Route::resource('admin/payMethod',PayMethodController::class);
    Route::resource('admin/fuelTypes',FuelTypeController::class);
    Route::resource('admin/transmission',TransmissionController::class);
	Route::any('admin/generalSetting',[SettingsController::class,'yb_general_settings']);
    Route::any('admin/socialNetworks',[SettingsController::class,'yb_social_links']);
    Route::any('admin/rentalSettings',[SettingsController::class,'yb_rental_settings']);
    Route::get('admin/all-users',[UserController::class,'index']);
    Route::post('admin/user/block',[UserController::class,'yb_changeStatus']);
});


Route::group(['middleware' => 'user'], function () { 
	Route::any('/login',[UserController::class, 'yb_userLogin']);
	Route::any('/user/my-profile',[UserController::class, 'yb_userProfile']);
	Route::any('/logout',[UserController::class, 'yb_userLogout']);


});
Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact-us',[HomeController::class,'contact']);

Route::get('/search-cars',[HomeController::class,'searchCars']);
Route::get('/rental-details',[HomeController::class,'rentalDetails']);
Route::post('/submit-booking',[BookingController::class,'store']);
Route::get('/detail/{text}',[HomeController::class,'yb_single']);
// Route::view('/u/login','public.login');
// Route::view('/signup','public.register');
// Route::view('/u/register','public.register');
Route::any('/userRegister',[UserController::class, 'yb_registerUser']);
Route::view('/u/register/success','public.register-success');


Route::get('pay-with-stripe', [StripePaymentController::class, 'stripe']);
Route::post('pay-with-stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

Route::view('/booking/success','public.payments.success');

Route::get('/pay-with-paypal', [PaypalController::class,'index']);
Route::post('/pay-with-paypal', ['as' => 'payment', 'uses' => 'App\Http\Controllers\PaypalController@payWithpaypal']);
Route::get('/pay-wirh-paypal/status',['as' => 'status', 'uses' => 'App\Http\Controllers\PaypalController@getPaymentStatus']);





