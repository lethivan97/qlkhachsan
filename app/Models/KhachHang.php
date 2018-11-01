<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model {
	public $timestamps = false;
	protected $table = 'khachhang';
	protected $fillable = [
		'MaKH', 'TenKH', 'Email', 'DiaChi', 'SDT',
	];
}
