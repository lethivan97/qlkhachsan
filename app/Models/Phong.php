<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model {
	public $timestamps = false;
	protected $table = 'phong';
	protected $fillable = [
		'MaPhong', 'MaTT', 'MaLoai', 'TenPhong', 'NgayDen', 'NgayDi', 'MoTa',
	];
}
