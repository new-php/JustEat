<?php

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/restaurants', 'RestaurantsViewController@restaurantsPage')->name('restaurants');
Route::get('/restaurant/{restaurant}', 'RestaurantsViewController@restaurantPage')->name('restaurant');
Route::get('/orderdetails', function () {return view('orderDetails');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ordertimeconfirm', function () {return view('orderTimeConfirm');});
Route::get('/paymentmethod', function () {return view('paymentMethod');});
