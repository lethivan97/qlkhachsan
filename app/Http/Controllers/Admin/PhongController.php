<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class PhongController extends Controller
{
    public function index(){
    	//$data = DB::table('Phong')->get();
    	$data = DB::select('
    		SELECT MaPhong, TenTT, TenLoai, TenPhong, Phong.MoTa 
    		FROM Phong, TrangThai, LoaiPhong 
    		WHERE Phong.MaTT = TrangThai.MaTT 
    			AND Phong.MaLoai = LoaiPhong.MaLoai
    		');
    	return view('admin.phong', ['phongs' => $data]);
    }
}
