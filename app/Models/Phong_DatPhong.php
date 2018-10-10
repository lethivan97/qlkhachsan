<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong_DatPhong extends Model {
	public $timestamps = false;
	protected $table = 'phong_datphong';
	protected $fillable = [
		'MaPhong', 'MaDat', 'NgayDen', 'NgayDi', 'MoTa',
	];
}
