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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('users', 'UserController');
Route::post('register','UserController@register');
Route::post('login','UserController@login');

Route::apiResource('publications','PublicationController');
Route::post('newpublication','PublicationController@newPublication');

//Route::get('user/name/{id}', 'UserController@nameFollower');
