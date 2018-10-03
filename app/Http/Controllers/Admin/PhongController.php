<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class PhongController extends Controller
{

    public function index(Request $request){
        $result = $this->getAllPhong();
        if($request->has('key'))
            $result = $result->where('Phong.TenPhong', 'like', '%'.$request->key.'%'); 
        
        $result = $result->paginate(10);
        return view('admin.phong', ['phongs' => $result]);
    }

    public function getAllPhong(){
        $result = DB::table('Phong')->join('TrangThai', 'TrangThai.MaTT', '=', 'Phong.MaTT')
                                    ->join('LoaiPhong', 'LoaiPhong.MaLoai', '=', 'Phong.MaLoai')
                                    ->select('Phong.MaPhong', 'Phong.TenPhong', 'TrangThai.TenTT', 'LoaiPhong.TenLoai', 'Phong.MoTa');
        return $result;
    }
}
