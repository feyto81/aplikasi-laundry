<?php

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
    return redirect()->route('admin.home');
});
Route::get('admin/login', 'HomeController@login')->name('login');
Route::post('admin/postlogin', 'HomeController@postLogin');
Route::get('admin/logout', 'HomeController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'checkRole:1']], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('cms_users', 'UserController');
    Route::get('cms_users/delete/{id}', 'UserController@destroy');
    Route::post('cms_users/update/{id}', 'UserController@update');
    Route::get('cms_users/edit/{id}', 'UserController@edit');
    Route::post('cms_users/update/{id}', 'UserController@update');
});
