<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model {
	public $timestamps = false;
	protected $table = 'loaiphong';
	protected $fillable = [
		'MaLoai', 'TenLoai', 'BiDanh', 'Giuong', 'SLNguoi', 'DienTich', 'SLPhong', 'HuongNhin', 'GiuongPhu', 'DonGia', 'MoTa', 'MoTaChiTiet', 'images',
	];
	public static function image($arr) {
		return $listLoai = explode(",", $arr);
	}
}
