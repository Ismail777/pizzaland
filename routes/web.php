<?php

use App\Item;
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

Route::get('/', 'WelcomeController@show')->name('home');
Route::resource('/items', 'ItemController')->except('show');
Route::get('/items/{item:title}','ItemController@show')->name('items.show');
Route::resource('cart', 'CartController')->only(['store','destroy']);
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart/update-quantity', 'CartController@updateQuantity')->name('cart.updateQuantity');
Route::get('shop', function () {
    $items = Item::all();

    return view('shop', compact('items'));
});
Route::post('/coupon', 'CouponController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

Route::middleware('admin')->group(function (){
    Route::resource('users','UserController');
    Route::resource('items','ItemController')->except('show');
    Route::livewire('categories','categories')->layout('layouts.auth');
});

Route::view('password/reset', 'auth.passwords.email')->name('password.request');
Route::get('password/reset/{token}', 'Auth\PasswordResetController')->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::view('email/verify', 'auth.verify')->middleware('throttle:6,1')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')->middleware('signed')->name('verification.verify');

    Route::post('logout', 'Auth\LogoutController')->name('logout');

    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');
});
