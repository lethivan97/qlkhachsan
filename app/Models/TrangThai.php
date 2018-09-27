<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model {
	public $timestamps = false;
	protected $table = 'trangthai';
	protected $fillable = [
		'MaTT', 'TenTT', '',
	];
}
