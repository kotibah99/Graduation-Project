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
    return view('index');
});



Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/users', 'admin\UsersController');
    Route::get('/users/{id}/imper', 'admin\UsersController@imper')->name('imper');
    Route::get('/stopimper', 'admin\UsersController@stopImper')->name('stopImper');
});
Route::post('student/create','admin\UsersController@student')->name('student.create');
Route::get('student/create','admin\UsersController@createS')->name('stc');
