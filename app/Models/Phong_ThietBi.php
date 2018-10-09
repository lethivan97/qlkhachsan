<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong_ThietBi extends Model {
	public $timestamps = false;
	protected $table = 'phong_thietbi';
	protected $fillable = [
		'MaPhong', 'MaTB', 'SoLuong', 'GhiChu',
	];
	public function thietbi() {
		return $this->belongsTo('App\Models\ThietBi', 'MaTB', 'MaTB');
	}
	public function phong() {
		return $this->belongsTo('App\Models\Phong', 'MaPhong', 'MaPhong');
	}
}
