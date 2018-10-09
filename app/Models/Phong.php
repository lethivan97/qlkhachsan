<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model {
	public $timestamps = false;
	protected $table = 'phong';
	protected $fillable = [
		'MaPhong', 'MaTT', 'MaLoai', 'TenPhong', 'MoTa',
	];
	public function loaiphong() {
		return $this->belongsTo('App\Models\LoaiPhong', 'MaLoai', 'MaPhong');
	}
	public function trangthai() {
		return $this->belongsTo('App\Models\TrangThai', 'MaTT', 'MaPhong');
	}
	public function phong_thietbi() {
		return $this->hasMany('App\Models\Phong_ThietBi', 'MaPhong', 'MaPhong');
	}

}
