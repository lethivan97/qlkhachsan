<?php
namespace App\DAO;
use App\Models\Phong;
use Illuminate\Support\Facades\DB;

class PhongDAO {

	public function filterByName($name) {
		$result = DB::table('Phong')->where('Phong.TenPhong', 'like', '%' . $name . '%');
		return $result;
	}

	public function getById($id) {
		// $result = DB::table('Phong');
		$result = Phong::query();
		if ($id != "") {
			$result = $result->where('Phong.MaPhong', '=', $id);
		}
		return $result;
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
		$phongs = DB::table('LoaiPhong')
			->join('Phong', 'Phong.MaLoai', '=', 'LoaiPhong.MaLoai')
			->leftjoin('Phong_DatPhong', 'Phong.MaPhong', '=', 'Phong_DatPhong.MaPhong')
			->where('Phong.MaTT', '<', '3')
			->where('LoaiPhong.MaLoai', '=', $maLoai)
			->select('Phong.MaPhong as MaPhong', 'TenLoai', 'Giuong', 'NguoiLon', 'TreCon', 'DienTich', 'MaTT', 'TenPhong', 'NgayDen', 'NgayDi', 'Phong.MoTa as MoTa', 'GiuongPhu', 'Phong.Image as Image', 'DonGia')
			->get();
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
}
?>
