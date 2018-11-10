<?php
namespace App\DAO;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ThietBiDAO {

	public function filterByName($name) {
		$result = DB::table('ThietBi')->where('ThietBi.TenTB', 'like', '%' . $name . '%');
		return $result;
	}

	public function getById($id) {
		$result = DB::table('ThietBi');
		if ($id != "") {
			$result = $result->where('ThietBi.MaTB', '=', $id);
		}
		return $result->select('MaTB', 'TenTB', 'Image')->orderBy('MaTB', 'desc');
	}

	public static function timKiemThietBi($maLoai) {
		if ($maLoai == null || $maLoai == '') {
			$thietbis = DB::table('ThietBi')
				->select('MaTB', 'TenTB', 'Image')
				->get();}
		return $thietbis;
	}

	public static function image($arr) {
		return $listTB = explode(",", $arr);
	}

	public static function paginate($items, $perPage = 15, $page = null, $options = []) {
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}
	public static function getTenPhong($id) {
		$result = DB::table('thietbi')
			->join('phong_thietbi', 'thietbi.MaTB', '=', 'phong_thietbi.MaTB')
			->join('phong', 'phong_thietbi.MaPhong', '=', 'phong.MaPhong')
			->where('thietbi.MaTB', $id)
			->select('TenPhong')
			->get();
		return $result;
	}
}
?>