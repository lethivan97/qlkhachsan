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
Route::get('/', 'ClientController@index')->name('client');
Route::get('/search', 'ClientController@timKiemPhong')->name('search');
Route::get('lienhe', 'ClientController@lienHe')->name('lienhe');
Route::get('gioithieu', 'ClientController@gioiThieu')->name('gioithieu');
Route::get('dichvu', 'ClientController@dichVu')->name('dichvu');
Route::group(['prefix' => 'loaiphong'], function () {
	Route::get('/', 'ClientController@loaiPhong')->name('loaiphong');
	Route::get('{name}', 'ClientController@phongDetail')->name('loaiphong.chitiet');
});
Route::get('datphong/{name?}', 'ClientController@thongTinDatPhong')->name('datphong');
Route::get('them-gio-hang/{id}/{ngayden?}/{ngaydi?}', 'ClientController@ThemVaoGioHang')->where('id', '[0-9]+')->name('them-gio-hang');
Route::get('dat-loai-phong', 'ClientController@danhSachPhong')->name('datphong.post');
// Login and Register
Auth::routes();
