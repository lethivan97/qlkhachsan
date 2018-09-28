<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
	protected $table = 'user';
	protected $fillable = [
		'MaKH', 'MaKH', 'SDT', 'DiaChi','CMND', 'email'
	];
}
