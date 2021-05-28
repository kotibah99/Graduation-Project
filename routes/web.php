<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/users', 'admin\UsersController');
    Route::get('/users/{id}/impersonate', 'admin\UsersController@impersonate')->name('imperosnate');
    Route::get('/stopimpersonate', 'admin\UsersController@stopImper')->name('stopImper');
    Route::get('logs', 'LogController@index')->name('logs.index');
    Route::get('logs/delete', 'LogController@destroy')->name('logs.delete');
    Route::resource('projects', 'ProjectController');
    Route::get('seconda/{primary}' ,'PrimaryController@seconda')->name('seconda');
    Route::resource('primaries', 'PrimaryController')->except(['edit','update','create']);;
});Route::resource('secondaries', 'SecondaryController');