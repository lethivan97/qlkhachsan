<?php

namespace App\Http\Controllers\Admin;

use App\DAO\ThongTinPhongDAO;
use App\Http\Controllers\Controller;

class ThongTinPhongController extends Controller {
	public function index() {
		$thongTinDAO = new ThongTinPhongDAO();
		$phongs = $thongTinDAO->danhsachPhong()->paginate(16);
		return view('admin.thongtinphong.index', compact('phongs'));
	}

}
