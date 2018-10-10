<?php

namespace App\Http\Controllers;

use App\DAO\PhongDAO;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class ClientController extends Controller {
	function index() {
		return view('index');
	}
	function timKiemPhong(Request $request) {
		$phongs = PhongDAO::timKiemPhong($request->MaLoai);
		$tenLoai = LoaiPhong::where('MaLoai', $request->MaLoai)->first()->TenLoai;
		foreach ($phongs as $key => $phong) {
			if ($phong->NgayDi == null || $phong->NgayDen = null) {
				$listPhong[] = $phong;
			} else if ($request->NgayDi < $phong->NgayDen) {
				$listPhong[] = $phong;
			} else if ($request->NgayDi > $phong->NgayDen && $request->NgayDen > $phong->NgayDi) {
				$listPhong[] = $phong;
			}
		}
		return view('client.timkiemphong', compact('listPhong', 'request', 'tenLoai'));
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
	function login() {
		return view('auth.login');
	}
	function register() {
		return view('auth.register');
	}
}
