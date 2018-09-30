<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model {
	public $timestamps = false;
	protected $table = 'loaiphong';
	protected $fillable = [
		'MaLoai', 'TenLoai', 'Giuong', 'SLNguoi', 'DienTich', 'SLPhong', 'HuongNhin', 'GiuongPhu', 'MoTa',
	];
}
