<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
	function index() {
		return view('index');
	}
	function timKiemPhong(Request $r) {
		$phongs = DB::table('LoaiPhong')
			->join('Phong', 'LoaiPhong.MaLoai', '=', 'Phong.MaLoai')
			->join('TrangThai', 'Phong.MaTT', '=', 'TrangThai.MaTT')
			->where('TrangThai.MaTT', 1)
			->where('LoaiPhong.MaLoai', '=', $r->MaLoai)
			->orWhere('Phong.NgayDi', '=', '')
			->get();
		dd($phongs);
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
