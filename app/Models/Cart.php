<?php
namespace App\Models;

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
		$tongNgay = $cart['ngaydi']->diffInDays($cart['ngayden']);
		$cart['sl_phong']++;
		$cart['dongia'] = $cart['sl_phong'] * $tongNgay;
		$this->phongs[$id] = $cart;
		$this->tongPhong++;
		$this->tongTien += $cart['dongia'];

	}
	public function deleteOneRoom($id) {
		$this->tongPhong--;
		$this->tongTien -= $this->phongs[$id]['dongia'];
		if ($this->phongs[$id]['sl_phong'] <= 0) {
			unset($this->phongs[$id]);
		}
	}
	public function deleteAll($id) {
		$this->tongPhong -= $this->phongs[$id]['sl_phong'];
		$this->tongTien -= $this->phongs[$id]['dongia'];
		unset($this->phongs[$id]);
	}
}

?>