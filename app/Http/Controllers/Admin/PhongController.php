<?php

namespace App\Http\Controllers\Admin;

use App\DAO\PhongDAO;
use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\Phong;
use App\Models\Phong_DatPhong;
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
		$this->validate($request,
			[
				'TenPhong' => 'required',
				'DonGia' => 'required|numeric',
				'MaTT' => 'required',
				'MaLoai' => 'required',
			],
			[
				'TenPhong.required' => 'Vui lòng nhập tên',
				'DonGia.required' => 'Vui lòng nhập đơn giá',
				'DonGia.numeric' => "Vui lòng chỉ nhập số",
				'MaTT.required' => 'Vui lòng chọn trạng thái',
				'MaLoai.required' => 'Vui lòng chọn loại phòng',

			]);
		$name = "";
		if ($request['Image'] != null) {
			$image = $_FILES['Image'];
			$name = uniqid() . "." . $image['name'];
			$filename = "image/phong/" . $name;
			move_uploaded_file($image['tmp_name'], $filename);
		}
		Phong::create([
			'TenPhong' => $request->TenPhong,
			'DonGia' => $request->DonGia,
			'MaTT' => $request->MaTT,
			'MaLoai' => $request->MaLoai,
			'Image' => $name,
			'MoTa' => $request->MoTa,
		]);
		return redirect()->route('admin.phong');
	}
	public function chiTietPhong($id) {
		$phong = Phong::where('MaPhong', $id)->first();
		$loaiphongs = LoaiPhong::all();
		$trangthais = TrangThai::all();
		return view('admin.phong.suaphong', compact('phong', 'loaiphongs', 'trangthais'));
	}
	public function savechiTietPhong($id, Request $request) {
		$this->validate($request,
			[
				'TenPhong' => 'required',
				'DonGia' => 'required|numeric',
				'MaTT' => 'required',
				'MaLoai' => 'required',
			],
			[
				'TenPhong.required' => 'Vui lòng nhập tên',
				'DonGia.required' => 'Vui lòng nhập đơn giá',
				'DonGia.numeric' => "Vui lòng chỉ nhập số",
				'MaTT.required' => 'Vui lòng chọn trạng thái',
				'MaLoai.required' => 'Vui lòng chọn loại phòng',

			]);
		$images = Phong::where("MaPhong", $id)->first()->Image;
		$phong = new Phong();
		$phong->MaTT = $request->MaTT;
		$phong->MaLoai = $request->MaLoai;
		$phong->TenPhong = $request->TenPhong;
		$phong->DonGia = $request->DonGia;
		$phong->MoTa = $request->MoTa;
		$name = "";
		if ($request->Image != null) {
			$file = $_FILES['Image'];
			$name = uniqid() . "." . $file['name'];
			$filename = "image/phong/" . $name;
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
			if ($images == "") {
				$phong->Image = $name;
			} else {
				$phong->Image = $images . ',' . $name;
			}
		}
		Phong::where("MaPhong", $id)->update($phong->toArray());
		return redirect()->route('admin.phong');
	}
	public function xoaPhong($id) {
		$count = Phong_DatPhong::where('MaPhong', $id)->count();
		if ($count > 0) {
			return redirect()->back()->with('thongbao', "Không thể xóa phòng này !");
		}
		Phong::where('MaPhong', $id)->delete();
		return redirect()->route('admin.phong');
	}
}
