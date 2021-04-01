<?php

use Illuminate\Support\Facades\Route;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use AshAllenDesign\LaravelExchangeRates\Classes\RequestBuilder;
use AshAllenDesign\LaravelExchangeRates\Exceptions\ExchangeRateException;
use AshAllenDesign\LaravelExchangeRates\Exceptions\InvalidCurrencyException;
use AshAllenDesign\LaravelExchangeRates\Exceptions\InvalidDateException;
use Carbon\Carbon;
use OpenExchangeRates\Rates\Rates;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::get('/login/writer', 'App\Http\Controllers\Auth\LoginController@showWriterLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/writer', 'App\Http\Controllers\Auth\RegisterController@showWriterRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/writer', 'App\Http\Controllers\Auth\LoginController@writerLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');
Route::post('/register/writer', 'App\Http\Controllers\Auth\RegisterController@createWriter');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/writer', 'writer');

route::get('/mail','App\Http\Controllers\HomeController@mail');

route::get('/form',function(){
    // $currency = currency()->getUserCurrency();
    // $str = currency(1, 'EUR', currency()->getUserCurrency());
    $exchangeRates = new ExchangeRate();
    // echo OpenExchange::convert('GBP');
    // return $str;
    // return ;
    $result = $exchangeRates->exchangeRate('AUD', 'EUR');
    return $result;
    return view('validation.form');
});
route::get('/validation','App\Http\Controllers\HomeController@validation')->name('storeuser');