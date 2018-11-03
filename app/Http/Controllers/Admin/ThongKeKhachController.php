<?php

namespace App\Http\Controllers\Admin;

use App\DAO\ThongKeKhachDAO;
use App\Http\Controllers\Controller;

class ThongKeKhachController extends Controller {
	public function index() {
		$khachdats = ThongKeKhachDAO::soKhachDat();
		$khachhethans = ThongKeKhachDAO::soKhachHetHanDat();
		return view('admin.lichphong.index', compact('khachdats', 'khachhethans'));
	}
}
