<?php
namespace App\DAO;
use Illuminate\Support\Facades\DB;

class ThongTinPhongDAO {
	public function danhsachPhong() {
		$phongs = DB::table('trangthai')
			->join('phong', 'trangthai.MaTT', '=', 'phong.MaTT')
			->select('phong.MaPhong as MaPhong', 'trangthai.MaTT as MaTT', 'trangthai.TenTT as TenTT', 'TenPhong');
		return $phongs;
	}
	public function chitietphong($id) {
		$phongs = DB::table('phong')
			->join('phong_datphong', 'phong.MaPhong', '=', 'phong_datphong.MaPhong')
			->join('datphong', 'phong_datphong.MaDat', '=', 'datphong.MaDat')
			->join('khachhang', 'datphong.MaKH', '=', 'khachhang.MaKH')
			->where('phong.MaPhong', $id)
			->select('phong.MaPhong as MaPhong', 'phong.MaTT as MaTT', 'NgayDi', 'NgayDen', 'TenKH', 'DonGia', 'SoNgay')
			->get();
		return $phongs;
	}
	public function tongtientheophong($id) {
		$tongtien = DB::table('phong')
			->join('phong_datphong', 'phong.MaPhong', '=', 'phong_datphong.MaPhong')
			->join('datphong', 'phong_datphong.MaDat', '=', 'datphong.MaDat')
			->join('khachhang', 'datphong.MaKH', '=', 'khachhang.MaKH')
			->where('phong.MaPhong', $id)
			->select(DB::raw("SUM(phong.DonGia*phong_datphong.SoNgay) as tongtien"))
			->first();
		return $tongtien;
	}
	public static function tongTienTheoThang() {
		$tongtien = DB::table('datphong')
			->select(DB::raw('SUM(TongTien) as tien'), DB::raw("MONTH(NgayDat) as Thang"))
			->orderBy(DB::raw("MONTH(NgayDat)"), 'asc')
			->groupBy(DB::raw("MONTH(NgayDat)"))
			->get();
		return $tongtien;
	}
}

?>