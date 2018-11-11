<?php
namespace App\DAO;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LoaiPhongDAO {

	public function filterByName($name) {
		$result = DB::table('LoaiPhong')->where('LoaiPhong.TenLoai', 'like', '%' . $name . '%');
		return $result;
	}

	public function getById($id) {
		$result = DB::table('LoaiPhong');
		if ($id != "") {
			$result = $result->where('LoaiPhong.MaLoai', '=', $id);
		}
		return $result->select()->orderBy('LoaiPhong.MaLoai', 'desc');
	}
	public static function getPhongByLoai($maLoai) {
		$listTB = DB::table('LoaiPhong')
			->join('Phong', 'Phong.MaLoai', '=', 'LoaiPhong.MaLoai')
			->where('LoaiPhong.MaLoai', $maLoai)
			->get();
		return $listTB;
	}
	public static function image($arr) {
		return $listLoai = explode(",", $arr);
	}

	public static function paginate($items, $perPage = 10, $page = null, $options = []) {
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}
}
?>
