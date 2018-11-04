<?php
Route::get('/', 'Admin\PhongController@index')->name('admin');
Route::group(['prefix' => 'phong', 'namespace' => 'Admin'], function () {
	Route::get('/', 'PhongController@danhSachPhong')->name('admin.phong');
	Route::get('xoa-phong/{id}', 'PhongController@xoaPhong')->name('admin.phong.xoa-phong');
	Route::get('them-moi', 'PhongController@themPhong')->name('admin.phong.them-moi');
	Route::post('them-moi', 'PhongController@savePhong')->name('admin.phong.them-moi');
	Route::get('sua-phong/{id}', 'PhongController@chiTietPhong')->name('admin.phong.sua-phong');
	Route::post('sua-phong/{id}', 'PhongController@savechiTietPhong')->name('admin.phong.sua-phong');
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
Route::get('thong-tin-phong', 'Admin\ThongTinPhongController@index')->name('thong-tin-phong');

?>


