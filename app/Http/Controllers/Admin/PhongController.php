<?php

namespace App\Http\Controllers\Admin;

use App\BDO\Phong;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhongController extends Controller {

	public function index(Request $request) {
		$result = Phong::getAllPhong();
		if ($request->has('key')) {
			$result = $result->where('Phong.TenPhong', 'like', '%' . $request->key . '%');
		}

		$result = $result->paginate(10);
		return view('admin.phong', ['phongs' => $result]);
	}

}
