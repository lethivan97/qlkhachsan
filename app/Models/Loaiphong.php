<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model {
	public $timestamps = false;
	protected $table = 'loaiphong';
	protected $fillable = [
		'MaLoai', 'TenLoai', 'BiDanh', 'Giuong', 'NguoiLon', 'TreCon', 'DienTich', 'HuongNhin', 'GiuongPhu', 'DonGia', 'MoTa', 'MoTaChiTiet', 'images',
	];
	public static function image($arr) {
		return $listLoai = explode(",", $arr);
	}
	public function phong() {
		return $this->hasMany('App\Models\Phong', 'MaLoai', 'MaLoai');
	}
}
