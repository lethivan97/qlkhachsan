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
Route::get('/', 'ClientController@index')->name('home');
Route::post('/', 'ClientController@timKiemPhong')->name('home');
Route::get('lienhe', 'ClientController@lienHe')->name('lienhe');
Route::get('gioithieu', 'ClientController@gioiThieu')->name('gioithieu');
Route::get('dichvu', 'ClientController@dichVu')->name('dichvu');
Route::group(['prefix' => 'loaiphong'], function () {
	Route::get('/', 'ClientController@loaiPhong')->name('loaiphong');
	Route::get('{name}', 'ClientController@phongDetail')->name('loaiphong.chitiet');
});
// Login and Register
Route::view('login', function () {
	return view('auth.login');
})->name('login');
Route::view('register', 'ClientController@register')->name('register');

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
