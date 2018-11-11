<?php

namespace App\Http\Controllers\Admin;

use App\DAO\ThietBiDAO;
use App\Http\Controllers\Controller;
use App\Models\Phong;
use App\Models\Phong_ThietBi;
use App\Models\ThietBi;
use Illuminate\Http\Request;

class ThietBiController extends Controller {
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
		$name = "";
		if ($request['Image'] != null) {
			$image = $_FILES['Image'];
			$name = uniqid() . "." . $image['name'];
			$filename = "image/thietbi/" . $name;
			move_uploaded_file($image['tmp_name'], $filename);
		}
		ThietBi::create([
			'TenTB' => $request->TenTB,
			'Image' => $name,
		]);
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
		$thietbi->TenTB = $request->TenTB;
		$name = "";
		if ($request->Image != null) {
			$file = $_FILES['Image'];
			$name = uniqid() . "." . $file['name'];
			$filename = "image/thietbi/" . $name;
			if ($file['size'] > 4096000) {
				$this->validate($request,
					[
						'Image' => 'size',
					],
					[
						'Image.size' => "Kích thước ảnh quá lớn",
					]);
			}
			move_uploaded_file($file['tmp_name'], $filename);
			$thietbi->Image = $name;
		}
		ThietBi::where("MaTB", $id)->update($thietbi->toArray());
		return redirect()->route('admin.thietbi');
	}
	public function xoaThietBi($id) {
		ThietBi::where('MaTB', $id)->delete();
		return redirect()->route('admin.thietbi');
	}
}
