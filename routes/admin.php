<?php
Route::view('/', 'admin')->name('admin');

Route::group(['prefix' => 'phong', 'namespace' => 'Admin'], function () {
	Route::get('/', 'PhongController@danhSachPhong')->name('admin.phong');
	Route::get('xoa-phong/{id}', 'PhongController@xoaPhong')->name('admin.phong.xoa-phong');
	Route::get('them-moi', 'PhongController@themPhong')->name('admin.phong.them-moi');
	Route::post('them-moi', 'PhongController@savePhong')->name('admin.phong.them-moi');
	Route::get('sua-phong/{id}', 'PhongController@chiTietPhong')->name('admin.phong.sua-phong');
	Route::post('sua-phong/{id}', 'PhongController@savechiTietPhong')->name('admin.phong.sua-phong');
});

Route::group(['prefix' => 'loaiphong', 'namespace' => 'Admin'], function () {
	Route::get('/', 'LoaiPhongController@danhSachLoaiPhong')->name('admin.loaiphong');
	Route::get('xoa-loaiphong/{id}', 'LoaiPhongController@xoaLoaiPhong')->name('admin.loaiphong.xoa-loaiphong');
	Route::get('them-moi', 'LoaiPhongController@themLoaiPhong')->name('admin.loaiphong.them-moi');
	Route::post('them-moi', 'LoaiPhongController@saveLoaiPhong')->name('admin.loaiphong.them-moi');
	Route::get('sua-loaiphong/{id}', 'LoaiPhongController@chiTietLoaiPhong')->name('admin.loaiphong.sua-loaiphong');
	Route::post('sua-loaiphong/{id}', 'LoaiPhongController@savechiTietLoaiPhong')->name('admin.loaiphong.sua-loaiphong');
});

Route::group(['prefix' => 'user', 'namespace' => 'Admin'], function () {
	Route::get('/', 'UserController@danhSachUser')->name('admin.user');
	Route::get('{id?}', 'UserController@xoaUser')->name('admin.user.xoa-user');
	Route::get('them-moi', 'UserController@themUser')->name('admin.user.them-moi');
	Route::post('them-moi', 'UserController@saveUser')->name('admin.user.them-moi');
	Route::get('sua-user/{id}', 'UserController@chiTietUser')->name('admin.user.sua-user');
	Route::post('sua-user/{id}', 'UserController@savechiTietUser')->name('admin.user.sua-user');
});
Route::get('thong-ke-khach', 'Admin\ThongKeKhachController@index')->name('thong-ke-khach');
Route::get('don-dat', 'Admin\DonDatController@index')->name('don-dat');
Route::get('bao-cao', 'Admin\BaoCaoController@index')->name('bao-cao');

Route::group(['prefix' => 'thietbi', 'namespace' => 'Admin'], function () {
	Route::get('/', 'ThietBiController@danhSachThietBi')->name('admin.thietbi');
	Route::get('xoa-thiet-bi/{id?}', 'ThietBiController@xoaThietBi')->name('admin.thietbi.xoa-thietbi');
	Route::get('them-moi', 'ThietBiController@themThietBi')->name('admin.thietbi.them-moi');
	Route::post('them-moi', 'ThietBiController@saveThietBi')->name('admin.thietbi.them-moi');
	Route::get('sua-thietbi/{id}', 'ThietBiController@chiTietThietBi')->name('admin.thietbi.sua-thietbi');
	Route::post('sua-thietbi/{id}', 'ThietBiController@savechiTietThietBi')->name('admin.thietbi.sua-thietbi');
});
?>


