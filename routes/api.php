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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix(config('api.version'))->group(function () {
    // Write routes here to be APP_URL/api/API_VERSION/...

    /*
    |
    | Auth Routes
    |
    */
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


    Route::get('restaurants', 'RestaurantController@index');

    Route::middleware('auth:api')->group(function() {
        Route::post('order', 'OrderController@store')->name('order.new');        
        Route::put('order/addess', 'OrderController@addAddress')->name('order.address');
        Route::put('order/pay', 'OrderController@pay')->name('order.pay');
        Route::get('user', 'UserController@show')->name('user');
    });
});
