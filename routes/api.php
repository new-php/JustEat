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

    Route::middleware('auth:api')->group(function() {
        Route::get('orders', 'OrderController@index')->name('order.get_all');
        Route::post('order', 'OrderController@store')->name('order.new');
        Route::put('order/{order}/address', 'OrderController@addAddress')->name('order.address');
        Route::put('order/{order}/delivery', 'OrderController@addDeliveryTime')->name('order.deliverytime');
        Route::put('order/{order}/pay', 'OrderController@pay')->name('order.pay');
        Route::get('order/{order}', 'OrderController@show')->name('order.info');
        Route::post('address', 'AddressController@store')->name('address.new');
        Route::put('address/{address}', 'AddressController@update')->name('address.put');
        Route::delete('address/{address}', 'AddressController@destroy')->name('address.remove');

        Route::get('user', 'UserController@show')->name('user.get');
        Route::put('user/{id}', 'UserController@update')->name('user.edit_info');
    });
});
