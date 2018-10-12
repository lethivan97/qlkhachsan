<?php
Route::get('/', 'Admin\PhongController@index')->name('admin');
Route::get('phong', 'Admin\PhongController@danhSachPhong')->name('admin.phong');
//

?>


