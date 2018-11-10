<?php

namespace App\Http\Controllers\Admin;

use App\DAO\PhongDAO;
use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\Phong;
use App\Models\TrangThai;
use Illuminate\Http\Request;

class PhongController extends Controller {
	public function danhSachPhong(Request $request) {
		$phongDAO = new PhongDAO();
		$result = $phongDAO->getById('')->paginate(10);
		return view('admin.phong.phong', ['phongs' => $result]);
	}
	public function deletePhong(Request $request) {
		dd($request->all());
	}
	public function themPhong() {
		$loaiphongs = LoaiPhong::all();
		$trangthais = TrangThai::all();
		return view('admin.phong.themphong', compact('loaiphongs', 'trangthais'));
	}
	public function savePhong(Request $request) {
		Phong::create($request->all());
		return redirect()->route('admin.phong');
	}
	public function chiTietPhong($id) {
		$phong = Phong::where('MaPhong', $id)->first();
		$loaiphongs = LoaiPhong::all();
		$trangthais = TrangThai::all();
		return view('admin.phong.suaphong', compact('phong', 'loaiphongs', 'trangthais'));
	}
	public function savechiTietPhong($id, Request $request) {
		$phong = new Phong();
		if ($request->Image != null) {
			Phong::where("MaPhong", $id)->update($request->all());
		} else {
			$phong->MaTT = $request->MaTT;
			$phong->MaLoai = $request->MaLoai;
			$phong->TenPhong = $request->TenPhong;
			$phong->DonGia = $request->DonGia;
			$phong->Image = Phong::where("MaPhong", $id)->first()->Image;
			$phong->MoTa = $request->MoTa;
			Phong::where("MaPhong", $id)->update($phong->toArray());
		}
		return redirect()->route('admin.phong');
	}
	public function xoaPhong($id) {
		Phong::where('MaPhong', $id)->delete();
		return redirect()->route('admin.phong');
	}
}
