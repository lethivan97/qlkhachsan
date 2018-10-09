<?php 
namespace App\DAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PhongDAO {

	public function filterByName($name){
		$result = DB::table('Phong')->where('Phong.TenPhong', 'like', '%' . $name . '%');
		return $result;
	}

	public function getById($id){
		$result = DB::table('Phong');
		if ($id != "") {
			$result = $result->where('Phong.MaPhong', '=', $id);
		}
		return $result;
	}

	public function insert($MaTT, $MaLoai, $TenPhong, $MoTa){
		DB::table('Phong')->insert(
			['MaTT' => $MaTT, 'MaLoai' => $MaLoai, 'TenPhong' => $TenPhong, 'MoTa' =>$MoTa]
		);
	}

	public function update($MaPhong, $MaTT, $MaLoai, $TenPhong, $MoTa){
		DB::table('Phong')
			->where('MaPhong', '=', $MaPhong)
			->update(['MaTT' => $MaTT, 'MaLoai' => $MaLoai, 'TenPhong' => $TenPhong, 'MoTa' => $MoTa]);
	}

	public function delete($MaPhong){
		DB::table('Phong')
			->where('MaPhong', '=', $MaPhong)
			->delete();
	}
}
?>
