<?php

namespace App\Http\Controllers;

use App\DAO\PhongDAO;
use App\Models\Cart;
use App\Models\LoaiPhong;
use App\Models\Phong;
use Illuminate\Http\Request;

class ClientController extends Controller {
	function index() {
		return view('index');
	}
	function timKiemPhong(Request $request) {
		$tenLoai = '';
		$phongs = PhongDAO::timKiemPhong($request->MaLoai);
		if ($request->MaLoai != null || $request->MaLoai != '') {
			$tenLoai = LoaiPhong::where('MaLoai', $request->MaLoai)->first()->TenLoai;
		}
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
	function thongTinDatPhong($name) {
		$loaiPhong = LoaiPhong::where('BiDanh', $name)->first();
		return view('client.formThongTin', compact('loaiPhong'));
	}
	public function danhSachPhong(Request $request) {
		$loaiPhong = LoaiPhong::where('MaLoai', $request->MaLoai)->first();
		$phongs = PhongDAO::timKiemPhong($loaiPhong->MaLoai);
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
		$listPhong->withPath('dat-loai-phong');
		return view('client.datLoaiPhong', compact('listPhong', 'loaiPhong', 'request', 'phongs'));
	}
	public function ThemVaoGioHang(Request $request, $id, $ngayden, $ngaydi) {
		$phong = Phong::where('MaPhong', $id)->first();
		$oldCart = Session('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->addPhong($phong, $id, $ngayden, $ngaydi);
		$request->session()->put('cart', $cart);
		return redirect()->back();
	}
}
