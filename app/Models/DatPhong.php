<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatPhong extends Model
{
    public $timestamps = false;
    protected $table = 'datphong';
    protected $fillable = [
    	'MaDat', 'MaKH', 'NgayDat'
    ];
}
