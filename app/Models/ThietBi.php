<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThietBi extends Model
{
    public $timestamps = false;
    protected $table = 'thietbi';
    protected $fillable = [
    	'MaTB', 'TenTB', 'SoLuong'
    ];
}