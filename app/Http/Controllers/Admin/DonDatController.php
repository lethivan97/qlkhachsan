<?php

namespace App\Http\Controllers\Admin;

use App\DAO\DonDatDAO;
use App\Http\Controllers\Controller;

class DonDatController extends Controller {
	public function index() {
		$dondatDAO = new DonDatDAO();
		$phongs = $dondatDAO->danhsachPhong()->paginate(16);
		return view('admin.dondat.index', compact('phongs'));
	}

}
