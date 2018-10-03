<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PhongController extends Controller {
	public function index() {
		//$data = DB::table('Phong')->get();
		/*$data = DB::select('
	          SELECT MaPhong, TenTT, TenLoai, TenPhong, Phong.MoTa
	          FROM Phong, TrangThai, LoaiPhong
	          WHERE Phong.MaTT = TrangThai.MaTT
	          AND Phong.MaLoai = LoaiPhong.MaLoai
*/
		$data = DB::table('TrangThai')->join('Phong', 'TrangThai.MaTT', '=', 'Phong.MaTT')
			->join('LoaiPhong', 'Phong.MaLoai', '=', 'LoaiPhong.MaLoai')
			->select('Phong.MaPhong', 'TenTT', 'TenLoai', 'TenPhong')
			->paginate(10);
		return view('admin.phong', ['phongs' => $data]);
	}
}
