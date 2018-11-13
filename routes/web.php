<?php
Route::get('/', 'ClientController@index')->name('client');
Route::get('/search', 'ClientController@timKiemPhong')->name('search');

Route::get('gioithieu', 'ClientController@gioiThieu')->name('gioithieu');
Route::get('dichvu', 'ClientController@dichVu')->name('dichvu');
Route::get('lienhe', 'ClientController@lienHe')->name('lienhe');
Route::post('lienhe', 'ClientController@sendMail')->name('lienhe');
Route::group(['prefix' => 'loaiphong'], function () {
	Route::get('/', 'ClientController@loaiPhong')->name('loaiphong');
	Route::get('{name}', 'ClientController@phongDetail')->name('loaiphong.chitiet');
});
Route::get('datphong/{name?}', 'ClientController@thongTinDatPhong')->name('datphong');
Route::get('them-gio-hang/{id}/{ngayden?}/{ngaydi?}', 'ClientController@ThemVaoGioHang')->where('id', '[0-9]+')->name('them-gio-hang');
Route::get('dat-loai-phong', 'ClientController@danhSachPhong')->name('datphong.post');
Route::get('danh-sach-phong-dat', 'ClientController@danhSachPhongDat')->name('danh-sach-phong-dat');
Route::get('xoa-phong-dat/{id}', 'ClientController@xoaPhongDat')->name('xoa-phong-dat');
Route::get('xoa-phong', 'ClientController@xoaTatCaPhong')->name('xoa-phong');
Route::get('thanh-toan', 'ClientController@thanhToan')->name('thanh-toan');
Route::post('thanh-toan', 'ClientController@postthanhToan')->name('thanh-toan');
Route::get('thong-tin-ca-nhan', 'ClientController@thongTinCaNhan')->name('tt-ca-nhan');
Route::post('thong-tin-ca-nhan', 'ClientController@luuThongTinCaNhan')->name('tt-ca-nhan');
// Login and Register
Auth::routes();
