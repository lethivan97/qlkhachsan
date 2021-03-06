<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThietBi extends Model {
	public $timestamps = false;
	protected $table = 'thietbi';
	protected $fillable = [
		'MaTB', 'TenTB', 'Image',
	];
	public function phong_thietbi() {
		return $this->belongsToMany('App\Models\Phong_ThietBi', 'MaTB', 'MaTB');
	}
	public static function image($arr) {
		return $listPhong = explode(",", $arr);
	}
}
