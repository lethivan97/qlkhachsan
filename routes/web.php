<?php

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
Route::get('/', 'HomeController@index')->name('home');
Route::get('lienhe', 'HomeController@lienHe')->name('lienhe');
Route::get('gioithieu', 'HomeController@gioiThieu')->name('gioithieu');
Route::get('dichvu', 'HomeController@dichVu')->name('dichvu');
Route::group(['prefix' => 'loaiphong'], function () {
	Route::get('/', 'HomeController@loaiPhong')->name('loaiphong');
	Route::get('{name?}', 'HomeController@phongDetail')->name('loaiphong.chitiet');
});
Route::view('login', 'auth.login');
