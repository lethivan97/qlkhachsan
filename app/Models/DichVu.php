<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
     public $timestamps = false;
	protected $table = 'dichvu';
	protected $fillable = [
		'MaDV', 'TenDV'
	];
}
