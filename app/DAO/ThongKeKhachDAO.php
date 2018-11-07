<?php
namespace App\DAO;
use Illuminate\Support\Facades\DB;

class ThongKeKhachDAO {
	public static function soKhachDat() {
		$khachdats = DB::table('datphong')
			->select(DB::raw('count(*) as sl_dat'), 'NgayDat')
			->groupBy('NgayDat')
			->get();
		return $khachdats;
	}
	public static function soKhachHetHanDat() {
		$khachhethans = DB::table('phong_datphong')
			->select(DB::raw('count(*) as sl'), 'NgayDi')
			->groupBy('NgayDi')
			->get();
		return $khachhethans;
	}
	public static function soKhachDatTheoThang() {
		$soluongs = DB::table('datphong')
			->select(DB::raw('count(*) as sl_dat'), DB::raw("MONTH(NgayDat) as Thang"))
			->orderBy(DB::raw("MONTH(NgayDat)"), 'asc')
			->groupBy(DB::raw("MONTH(NgayDat)"))
			->get();
		return $soluongs;
	}
}
?>