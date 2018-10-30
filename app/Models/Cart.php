<?php
namespace App\Models;
use Carbon\Carbon;

class Cart {
	public $phongs = null;
	public $tongPhong = 0;
	public $tongTien = 0;
	public function __construct($oldCart) {
		if ($oldCart) {
			$this->phongs = $oldCart->phongs;
			$this->tongPhong = $oldCart->tongPhong;
			$this->tongTien = $oldCart->tongTien;

		}
	}
	public function addPhong($phong, $id, $ngayden, $ngaydi) {
		$cart = ['sl_phong' => 0, 'dongia' => $phong->DonGia, 'phong' => $phong, 'ngayden' => $ngayden, 'ngaydi' => $ngaydi];
		if ($this->phongs) {
			if (array_key_exists($id, $this->phongs)) {
				$cart = $this->phongs[$id];
			}
		}
		$ngayden = Carbon::parse($cart['ngayden']);
		$ngaydi = Carbon::parse($cart['ngaydi']);
		$tongNgay = (int) ($ngaydi->diffInDays($ngayden));
		$cart['sl_phong']++;
		$cart['dongia'] = $phong->DonGia * $cart['sl_phong'] * $tongNgay;
		$this->phongs[$id] = $cart;
		$this->tongPhong++;
		$this->tongTien += $phong->DonGia * $tongNgay;

	}
	public function xoaPhong($id) {
		$this->tongPhong--;
		$this->tongTien -= $this->phongs[$id]['dongia'];
		// dd($this->tongTien, $this->phongs[$id]);
		unset($this->phongs[$id]);
	}
	public function xoaTatCa($id) {
		$this->tongPhong -= $this->phongs[$id]['sl_phong'];
		$this->tongTien -= $this->phongs[$id]['dongia'];
		unset($this->phongs[$id]);
	}
}

?>