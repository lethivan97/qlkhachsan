<?php
namespace App\DAO;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PhongDAO {

	public function filterByName($name) {
		$result = DB::table('Phong')->where('Phong.TenPhong', 'like', '%' . $name . '%');
		return $result;
	}

	public function getById($id) {
		// $result = DB::table('Phong');
		$result = DB::table('LoaiPhong')
			->join('Phong', 'LoaiPhong.MaLoai', '=', 'Phong.MaLoai')
			->join('TrangThai', 'Phong.MaTT', '=', 'TrangThai.MaTT');
		if ($id != "") {
			$result = $result->where('Phong.MaPhong', '=', $id);
		}
		return $result->select('Phong.MaPhong as MaPhong', 'TenPhong', 'TrangThai.MaTT as MaTT', 'TenLoai', 'TenTT', 'Phong.DonGia as DonGia', 'Phong.MoTa as MoTa', 'Phong.Image as images', 'LoaiPhong.MaLoai as MaLoai')->orderBy('Phong.MaPhong', 'desc');
	}

	public function insert($MaTT, $MaLoai, $TenPhong, $MoTa) {
		DB::table('Phong')->insert(
			['MaTT' => $MaTT, 'MaLoai' => $MaLoai, 'TenPhong' => $TenPhong, 'MoTa' => $MoTa]
		);
	}

	public function update($MaPhong, $MaTT, $MaLoai, $TenPhong, $MoTa) {
		DB::table('Phong')
			->where('MaPhong', '=', $MaPhong)
			->update(['MaTT' => $MaTT, 'MaLoai' => $MaLoai, 'TenPhong' => $TenPhong, 'MoTa' => $MoTa]);
	}

	public function delete($MaPhong) {
		DB::table('Phong')
			->where('MaPhong', '=', $MaPhong)
			->delete();
	}
	public static function timKiemPhong($maLoai) {
		if ($maLoai == null || $maLoai == '') {
			$phongs = DB::table('LoaiPhong')
				->join('Phong', 'Phong.MaLoai', '=', 'LoaiPhong.MaLoai')
				->leftjoin('Phong_DatPhong', 'Phong.MaPhong', '=', 'Phong_DatPhong.MaPhong')
				->where('Phong.MaTT', '<', '3')
				->select('Phong.MaPhong as MaPhong', 'TenLoai', 'Giuong', 'NguoiLon', 'TreCon', 'DienTich', 'MaTT', 'TenPhong', 'NgayDen', 'NgayDi', 'Phong.MoTa as MoTa', 'GiuongPhu', 'Phong.Image as Image', 'Phong.DonGia')
				->get();
		} else {
			$phongs = DB::table('LoaiPhong')
				->join('Phong', 'Phong.MaLoai', '=', 'LoaiPhong.MaLoai')
				->leftjoin('Phong_DatPhong', 'Phong.MaPhong', '=', 'Phong_DatPhong.MaPhong')
				->where('Phong.MaTT', '<', '3')
				->where('LoaiPhong.MaLoai', '=', $maLoai)
				->select('Phong.MaPhong as MaPhong', 'TenLoai', 'Giuong', 'NguoiLon', 'TreCon', 'DienTich', 'MaTT', 'TenPhong', 'NgayDen', 'NgayDi', 'Phong.MoTa as MoTa', 'GiuongPhu', 'Phong.Image as Image', 'Phong.DonGia')
				->get();
		}

		return $phongs;
	}
	public static function getThietBi($id) {
		$listTB = DB::table('Phong')
			->join('Phong_ThietBi', 'Phong.MaPhong', '=', 'Phong_ThietBi.MaPhong')
			->join('ThietBi', 'Phong_ThietBi.MaTB', '=', 'ThietBi.MaTB')
			->where('Phong.MaPhong', $id)
			->get();
		return $listTB;
	}
	public static function image($arr) {
		return $listLoai = explode(",", $arr);
	}

	public static function paginate($items, $perPage = 15, $page = null, $options = []) {
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}
	public static function getPhongByID($id) {

	}
}
?>
