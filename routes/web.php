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

Route::get('/', function () {
    return view('welcome');
});
// Public JSON for a Caption record(s).
Route::get('/api/captions', 'CaptionsController@index');
Route::get('/api/captions/{caption}', 'CaptionsController@show');

Auth::routes();
// Dashboard.
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// User Account
Route::get('/dashboard/account/{user}', 'DashboardController@showAccount')->name('account');
// Create Caption form.
Route::get('/dashboard/captions/create', 'CaptionsController@create');
// View a Caption in the browser.
Route::get('/dashboard/captions/{caption}', 'DashboardController@showCaption');
// Store a Caption
Route::post('/dashboard/captions', 'CaptionsController@store');
// Delete a Caption
Route::delete('/dashboard/captions/{caption}', 'CaptionsController@destroy');

