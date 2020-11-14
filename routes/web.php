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

Route::get('/mainPage', 'mainPageViewController@mainPage')->name('mainPage');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
