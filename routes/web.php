<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('waypointscategories', 'Admin\WaypointsCategoriesController');
    Route::resource('location', 'Admin\LocationsController');
    Route::resource('reviews', 'Admin\ReviesController');


    Route::get('notify', [

        'uses' => 'Admin\WaypointsCategoriesController@notify',
        'as'   => 'notify'
    ]);

    Route::get('send-notify', [

        'uses' => 'Admin\WaypointsCategoriesController@send_notification',
        'as'   => 'send-notify'
    ]);
});
