<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;

class HomeController extends Controller {
	function index() {
		return view('index');
	}
	function lienHe() {
		return view('client.lienhe');
	}
	function gioiThieu() {
		return view('client.gioithieu');
	}
	function dichVu() {
		return view('client.dichvu');
	}
	function loaiPhong() {
		$listLoaiPhong = LoaiPhong::all();
		return view('client.loaiphong', compact('listLoaiPhong'));
	}
	function phongDetail($name) {
		$phong = LoaiPhong::all()->where('BiDanh', $name)->first();
		return view('client.chitietloaiphong', compact('phong'));
	}
	function sendMail() {

	}
}
