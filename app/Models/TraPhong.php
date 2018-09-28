<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraPhong extends Model
{
    public $timestamps = false;
    protected $table = 'traphong';
    protected $fillable = [
    	'MaTP', 'MaKH', 'NgayTra', 'TienDP', 'TongTien'
    ];
}
