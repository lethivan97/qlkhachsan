<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ThongTinPhongController extends Controller {
	public function index() {
		return view('admin.thongtinphong.index');
	}
}
