<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::post('signup', 'AuthController@signup');
Route::get('verify/{token}', 'AuthController@verifyEmail')->name('verify');

Route::group([
    //'middleware' => ['verified']
],
    function() {
        Route::post('login', 'AuthController@login')->name('login');
});

Route::group([
    'middleware' => ['auth:api', 'verified']
], function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');
    Route::get('profile', 'AuthController@showAuthUserProfile');
    Route::resource('user', 'UserController');
    Route::get('news/most-commented', 'NewsController@mostCommented');
    Route::resource('news', 'NewsController');
    Route::resource('subscription', 'SubscriptionController');
});


