<?php

namespace App\Http\Controllers\Admin;

use App\DAO\PhongDAO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhongController extends Controller {
	public function index() {
		return view('admin');
	}
	public function danhSachPhong(Request $request) {
		$phongDAO = new PhongDAO();
		$result = $phongDAO->getById('')->paginate();
		return view('admin.phong', ['phongs' => $result]);
	}

}
