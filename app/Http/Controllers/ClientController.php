<?php

namespace App\Http\Controllers;

use App\DAO\PhongDAO;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class ClientController extends Controller {
	/*
		Ngăn chặn không cho sử dụng đến controller này
		 public function __construct() {
			$this->middleware('auth');
	*/
	function index() {
		return view('index');
	}
	function timKiemPhong(Request $request) {
		$phongs = PhongDAO::timKiemPhong($request->MaLoai);
		$tenLoai = LoaiPhong::where('MaLoai', $request->MaLoai)->first()->TenLoai;
		foreach ($phongs as $key => $phong) {
			if ($phong->NgayDi == null || $phong->NgayDen = null) {
				$list[] = $phong;
			} else if ($request->NgayDi < $phong->NgayDen) {
				$list[] = $phong;
			} else if ($request->NgayDi > $phong->NgayDen && $request->NgayDen > $phong->NgayDi) {
				$list[] = $phong;
			}
		}
		$listPhong = PhongDAO::paginate($list, $perPage = 4, $page = null, $options = []);
		$listPhong->withPath('search');
		return view('client.timkiemphong', compact('listPhong', 'request', 'tenLoai', 'phongs'));
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
		$loaiphong = LoaiPhong::all()->where('BiDanh', $name)->first();
		return view('client.chitietloaiphong', compact('loaiphong'));
	}
	function sendMail() {
	}
	function login() {
		return view('auth.login');
	}
	function register() {
		return view('auth.register');
	}
	function thongTinDatPhong($name = null) {
		echo "string";
	}
}
