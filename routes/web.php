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

Route::get('/', function () {
	return view('index');
})->name('home');
Route::get('lienhe', function () {
	return view('client.lienhe');
})->name('lienhe');
Route::get('gioithieu', function () {
	return view('client.gioithieu');
})->name('gioithieu');
Route::get('dichvu', function () {
	return view('client.dichvu');
})->name('dichvu');