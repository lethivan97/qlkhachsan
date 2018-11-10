<?php

namespace App\Http\Controllers\Admin;

use App\DAO\ThietBiDAO;
use App\Http\Controllers\Controller;
use App\Models\ThietBi;
use App\Models\Phong_ThietBi;
use App\Models\Phong;
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
		$this->validate($request,
	        [
	            'TenTB' => 'required|min:1|max:255',
	        ],
	        [
	            'TenTB.required' => 'Tên thiết bị không được để trống',
	        ]
   		);
		ThietBi::create($request->all());
		return redirect()->route('admin.thietbi');
	}
	public function chiTietThietBi($id) {
		$thietbi = ThietBi::where('MaTB', $id)->first();
		$phongs = Phong::all();
		$phong_thietbi = Phong_ThietBi::all();
		return view('admin.thietbi.suathietbi', compact('thietbi', 'phongs', 'phong_thietbi'));
	}
	public function savechiTietThietBi($id, Request $request) {
		$thietbi = new ThietBi();
		$this->validate($request,
	        [
	            'TenTB' => 'required|min:1|max:255',
	        ],
	        [
	            'TenTB.required' => 'Tên thiết bị không được để trống',
	        ]
   		);
		if ($request->Image != null) {
			ThietBi::where("MaTB", $id)->update(request()->except(['_token','upload']));
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
