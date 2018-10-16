<?php

use Illuminate\Http\Request;

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

Route::get('all-categories', [

    'uses' => 'Apis\CategoriesController@index',
    'as'   => 'all-categories'
]);

Route::post('search-categories', [

    'uses' => 'Apis\CategoriesController@search_categories',
    'as'   => 'search-categories'
]);

Route::post('add-new-review', [

    'uses' => 'Apis\CategoriesController@review',
    'as'   => 'add-new-review'
]);

Route::post('get-locations', [

    'uses' => 'Apis\CategoriesController@get_location',
    'as'   => 'get-locations'
]);