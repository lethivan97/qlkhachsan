<?php

namespace App\Http\Controllers\Admin;

use App\DAO\LoaiPhongDAO;
use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\Phong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller {
	public function index() {
		return view('admin');
	}
	public function danhSachLoaiPhong(Request $request) {
		$loaiPhongDAO = new LoaiPhongDAO();
		$result = $loaiPhongDAO->getById('')->paginate(10);
		return view('admin.loaiphong.loaiphong', ['loaiphongs' => $result]);
	}
	public function deleteLoaiPhong(Request $request) {
		dd($request->all());
	}
	public function themLoaiPhong() {
		return view('admin.loaiphong.themloaiphong');
	}
	public function saveLoaiPhong(Request $request) {
		$loaiphong = new LoaiPhong();
		$loaiphong->TenLoai = $request->TenLoai;
		$loaiphong->BiDanh = $request->BiDanh;
		$loaiphong->Giuong = $request->Giuong;
		$loaiphong->NguoiLon = $request->NguoiLon;
		$loaiphong->TreCon = $request->TreCon;
		$loaiphong->DienTich = $request->DienTich;
		$loaiphong->HuongNhin = $request->HuongNhin;
		$loaiphong->GiuongPhu = $request->GiuongPhu;
		$loaiphong->DonGia = $request->DonGia;
		$loaiphong->MoTa = $request->MoTa;
		$loaiphong->MoTaChiTiet = $request->MoTaChiTiet;
		$errors = $this->validateLoaiPhong($loaiphong);
		if ($errors != "") {
			return redirect()->back()->withInput($request->all())->with('errors', $errors);
		}
		if ($request->Image != null) {
			$file = $request->Image;
			$filename = $this->genFileName() . "." . $file->getClientOriginalExtension();
			$file->move('image/loaiphong', $filename);
			$loaiphong->images = $filename;
		}
		LoaiPhong::create($loaiphong->toArray());
		return redirect()->route('admin.loaiphong');
	}

	public function chiTietLoaiPhong($id) {
		$loaiphong = LoaiPhong::where('MaLoai', $id)->first();
		return view('admin.loaiphong.sualoaiphong', compact('loaiphong'));
	}

	public function genFileName() {
		$date = getdate();
		$result = 'image';
		$result .= $date['mday'] . "" . $date['mon'] . "" . $date['year'] . "" . $date['hours'] . "" . $date['minutes'] . "" . $date['seconds'];
		return $result;
	}
	public function savechiTietLoaiPhong($id, Request $request) {
		$loaiphong = new LoaiPhong();
		$loaiphong->TenLoai = $request->TenLoai;
		$loaiphong->BiDanh = $request->BiDanh;
		$loaiphong->Giuong = $request->Giuong;
		$loaiphong->NguoiLon = $request->NguoiLon;
		$loaiphong->TreCon = $request->TreCon;
		$loaiphong->DienTich = $request->DienTich;
		$loaiphong->DonGia = $request->DonGia;
		$errors = $this->validateLoaiPhong($loaiphong);
		if ($errors != "") {
			return redirect()->back()->withInput($request->all())->with('errors', $errors);
		}
		$images = LoaiPhong::where("MaLoai", $id)->first()->images;
		if ($request->Image != null) {
			$file = $request->Image;
			$filename = $this->genFileName() . "." . $file->getClientOriginalExtension();
			$file->move('image/loaiphong', $filename);
			if ($images == "") {
				$loaiphong->images = $filename;
			} else {
				$loaiphong->images = $images . ',' . $filename;
			}

		}
		LoaiPhong::where('MaLoai', $id)->update($loaiphong->toArray());
		return redirect()->route('admin.loaiphong');
	}
	public function xoaLoaiPhong($id) {
		$count = Phong::where('MaLoai', $id)->count();
		if ($count > 0) {
			return redirect()->back()->with('error', 'Không thể xóa loại phòng này!');
		}
		LoaiPhong::where('MaLoai', $id)->delete();
		return redirect()->route('admin.loaiphong');
	}
	public function validateLoaiPhong($loaiPhong) {
		$error = "";
		if ($loaiPhong->TenLoai == "") {
			$error .= "Chưa nhập tên loại!<br>";
		}
		if ($loaiPhong->BiDanh == "") {
			$error .= "Chưa nhập bí danh!<br>";
		}
		if ($loaiPhong->Giuong == "") {
			$error .= "Chưa nhập loại giường!<br>";
		}
		if ($loaiPhong->NguoiLon == "") {
			$error .= "Chưa nhập số lượng người lớn!<br>";
		}
		if ($loaiPhong->TreCon == "") {
			$error .= "Chưa nhập số lượng trẻ con!<br>";
		}
		if ($loaiPhong->NguoiLon < 0) {
			$error .= "Số lượng người lớn không hợp lệ!<br>";
		}
		if ($loaiPhong->TreCon < 0) {
			$error .= "Số lượng trẻ con không hợp lệ!<br>";
		}
		if ($loaiPhong->NguoiLon + $loaiPhong->TreCon <= 0) {
			$error .= "Một phòng phải có ít nhất một người!<br>";
		}
		if ($loaiPhong->DienTich == "") {
			$error .= "Chưa nhập diện tích phòng!<br>";
		}
		if ($loaiPhong->HuongNhin == "") {
			$error .= "Chưa nhập hướng nhìn!<br>";
		}
		if ($loaiPhong->GiuongPhu == "") {
			$error .= "Chưa chọn giường phụ!<br>";
		}
		if ($loaiPhong->DonGia == "") {
			$error .= "Chưa nhập đơn giá!<br>";
		}
		if ($loaiPhong->DonGia < 0) {
			$error .= "Giá phòng không hợp lệ!<br>";
		}
		return $error;
	}
}
