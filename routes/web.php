<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Caption;
use App\User;

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

Route::get('/', 'View\WelcomeController@index');
// Public JSON for a Caption record(s).
Route::get('/api/captions', 'Api\CaptionsController@index');
Route::get('/api/captions/{caption}', 'Api\CaptionsController@show');

Auth::routes();
// Dashboard.
Route::get('/dashboard', 'View\CaptionsController@index');
// User Account
Route::get('/dashboard/account/{user}', 'View\DashboardController@account')->name('account');
// Create Caption form.
Route::get('/dashboard/captions/create', 'View\CaptionsController@create');
// View a Caption in the browser.
Route::get('/dashboard/captions/{caption}', 'View\CaptionsController@show');
// View a Caption Embed in the browser.
Route::get('/embed/{caption}', 'View\CaptionsController@showEmbed')->name('embed');
// Store a Caption
Route::post('/dashboard/captions', 'View\CaptionsController@store');
// Delete a Caption
Route::delete('/dashboard/captions/{caption}', 'View\CaptionsController@destroy');

