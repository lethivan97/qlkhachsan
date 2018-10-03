<?php
Route::get('/', function () {
	return view('admin');
})->name('admin');
Route::get('phong', function () {
	return view('admin.phong');
})->name('admin');
?>

