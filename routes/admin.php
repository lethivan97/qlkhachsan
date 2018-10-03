<?php
Route::get('/', function () {
	return view('admin');
})->name('admin');
<<<<<<< HEAD
Route::get('phong', 'Admin\PhongController@index')->name('admin.phong');
=======

Route::get('phong', 'Admin\PhongController@index')->name('adminphong');

>>>>>>> a1369c77584218cde95804ee4257411a865f1caa
?>


