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
    Route::get('cms_users/active/{id}', 'UserController@active');
    Route::get('cms_users/unactive/{id}', 'UserController@unactive');

    Route::resource('outlet', 'OutletController');
    Route::get('outlet/delete/{id}', 'OutletController@destroy');
    Route::get('outlet/edit/{id}', 'OutletController@edit');
    Route::post('outlet/update/{id}', 'OutletController@update');

    Route::resource('member', 'MemberController');
    Route::get('member/delete/{id}', 'MemberController@destroy');
    Route::get('member/edit/{id}', 'MemberController@edit');
    Route::post('member/update/{id}', 'MemberController@update');

    Route::resource('paket', 'PaketController');
    Route::get('paket/delete/{id}', 'PaketController@destroy');
    Route::get('paket/edit/{id}', 'PaketController@edit');
    Route::post('paket/update/{id}', 'PaketController@update');

    Route::resource('transaction', 'TransactionController');
});
