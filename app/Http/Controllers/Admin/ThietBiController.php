<?php

namespace App\Http\Controllers\Admin;

use App\DAO\ThietBiDAO;
use App\Http\Controllers\Controller;
use App\Models\ThietBi;
use Illuminate\Http\Request;

class ThietBiController extends Controller
{
    public function index() {
		return view('admin');
	}
	public function danhSachThietBi(Request $request) {
		$thietbiDAO = new ThietBiDAO();
		$result = $thietbiDAO->getById('')->paginate(10);
		return view('admin.thietbi.thietbi', ['thietbis' => $result]);
	}
	public function deleteThietBi(Request $request) {
		dd($request->all());
	}
	public function themThietBi() {
		return view('admin.thietbi.themthietbi');
	}
	public function saveThietBi(Request $request) {
		ThietBi::create($request->all());
		return redirect()->route('admin.thietbi');
	}
	public function chiTietThietBi($id) {
		$thietbi = ThietBi::where('MaTB', $id)->first();
		return view('admin.thietbi.suathietbi', compact('thietbi'));
	}
	public function savechiTietThietBi($id, Request $request) {
		$thietbi = new ThietBi();
		if ($request->Image != null) {
			ThietBi::where("MaTB", $id)->update($request->all());
		} else {
			$thietbi->TenTB = $request->TenTB;
			$thietbi->Image = ThietBi::where("MaTB", $id)->first()->Image;
			$thietbi->SoLuong = $request->SoLuong;
			ThietBi::where("MaTB", $id)->update($thietbi->toArray());
		}
		return redirect()->route('admin.thietbi');
	}
	public function xoaThietBi($id) {
		ThietBi::where('MaTB', $id)->delete();
		return redirect()->route('admin.thietbi');
	}
}
