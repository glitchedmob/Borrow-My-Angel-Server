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


Route::get('resources/local/search', 'LocalResourcesController@search');
Route::get('resources/local', 'LocalResourcesController@show');
Route::get('resources/national/search/', 'NationalResourcesController@search');
Route::get('resources/national', 'NationalResourcesController@show');
Route::get('resources/categories', 'ResourceCategoryController@index');
Route::post('users/login', 'UserController@login');
Route::post('users/signup', 'UserController@signup');
Route::post('angels/login', 'AngelController@login');
Route::post('angels/signup', 'AngelController@signup');

Route::group([
    'middleware' => 'jwt.auth',
], function($router) {
   // Routes defined here can only be accessed when authenticated
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
