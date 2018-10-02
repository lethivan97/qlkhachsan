<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
	public $timestamps = false;
	protected $table = 'image';
	protected $fillable = [
		'ID', 'MaLoai', 'MaPhong', 'Url',
	];
}
