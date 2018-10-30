<?php

use Illuminate\Http\Request;
use App\Caption;

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
//
//Route::middleware('auth:api')->patch('test', function() {
//  return 'test route';
//});

// @TODO: move this to api routes with Oauth/JWT authenication.
//Route::middleware('auth:api')->patch('captions/{caption}', 'CaptionsController@updateCurrentTime');
Route::patch('captions/{caption}', 'CaptionsController@updateCurrentTime')->middleware('auth.basic.once');
