<?php

use App\Http\Controllers\LikesController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('users', 'UserController');
Route::post('register','UserController@register');
Route::post('login','UserController@login');

Route::prefix('publication')->group(function () {
    Route::get('getall','PublicationController@getPublication');
    
    Route::middleware(['auth:api'])->group(function () {
        Route::post('newpublication','PublicationController@newPublication');
        });
});

Route::prefix('likes')->group(function () {
    Route::get('getAll', 'LikesController@getLikesAll');

    Route::middleware(['auth:api'])->group(function () {

        Route::post('add', 'LikesController@addLike');
        Route::delete('subtrac/{id}', 'LikesController@subtractLike');
        });

});


//Route::get('user/name/{id}', 'UserController@nameFollower');
