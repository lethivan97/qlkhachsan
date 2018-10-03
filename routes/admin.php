<?php
Route::get('/', function () {
	return view('admin');
})->name('admin');
Route::get('phong', 'Admin\PhongController@index')->name('adminphong');
?>

