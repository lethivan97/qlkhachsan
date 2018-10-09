<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model {
	public $timestamps = false;
	protected $table = 'trangthai';
	protected $fillable = [
		'MaTT', 'TenTT',
	];
	public function phong() {
		return $this->hasMany('App\Models\Phong', 'MaPhong', 'MaTT');
	}
}
