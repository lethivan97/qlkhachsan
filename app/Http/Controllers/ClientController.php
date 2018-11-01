<?php

namespace App\Http\Controllers;

use App\DAO\PhongDAO;
use App\Models\Cart;
use App\Models\DatPhong;
use App\Models\KhachHang;
use App\Models\LoaiPhong;
use App\Models\Phong;
use App\Models\Phong_DatPhong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class ClientController extends Controller {
	function index() {
		return view('index');
	}
	function timKiemPhong(Request $request) {
		$tenLoai = '';
		$phongs = PhongDAO::timKiemPhong($request->MaLoai);
		if ($request->MaLoai != null || $request->MaLoai != '') {
			$tenLoai = LoaiPhong::where('MaLoai', $request->MaLoai)->first()->TenLoai;
		}
		foreach ($phongs as $key => $phong) {
			if ($phong->NgayDi == null || $phong->NgayDen = null) {
				$list[] = $phong;
			} else if ($request->NgayDi < $phong->NgayDen) {
				$list[] = $phong;
			} else if ($request->NgayDi > $phong->NgayDen && $request->NgayDen > $phong->NgayDi) {
				$list[] = $phong;
			}
		}
		$listPhong = PhongDAO::paginate($list, $perPage = 4, $page = null, $options = []);
		$listPhong->withPath('search');
		return view('client.timkiemphong', compact('listPhong', 'request', 'tenLoai', 'phongs'));
	}
	function lienHe() {
		return view('client.lienhe');
	}
	function gioiThieu() {
		return view('client.gioithieu');
	}
	function dichVu() {
		return view('client.dichvu');
	}
	function loaiPhong() {
		$listLoaiPhong = LoaiPhong::all();
		return view('client.loaiphong', compact('listLoaiPhong'));
	}
	function phongDetail($name) {
		$loaiphong = LoaiPhong::all()->where('BiDanh', $name)->first();
		return view('client.chitietloaiphong', compact('loaiphong'));
	}
	function sendMail() {
	}
	function login() {
		return view('auth.login');
	}
	function register() {
		return view('auth.register');
	}
	function thongTinDatPhong($name) {
		$loaiPhong = LoaiPhong::where('BiDanh', $name)->first();
		return view('client.formthongtin', compact('loaiPhong'));
	}
	public function danhSachPhong(Request $request) {
		$loaiPhong = LoaiPhong::where('MaLoai', $request->MaLoai)->first();
		$phongs = PhongDAO::timKiemPhong($loaiPhong->MaLoai);
		foreach ($phongs as $key => $phong) {
			if ($phong->NgayDi == null || $phong->NgayDen = null) {
				$list[] = $phong;
			} else if ($request->NgayDi < $phong->NgayDen) {
				$list[] = $phong;
			} else if ($request->NgayDi > $phong->NgayDen && $request->NgayDen > $phong->NgayDi) {
				$list[] = $phong;
			}
		}
		$listPhong = PhongDAO::paginate($list, $perPage = 4, $page = null, $options = []);
		$listPhong->withPath('dat-loai-phong');
		return view('client.datloaiphong', compact('listPhong', 'loaiPhong', 'request', 'phongs'))->with('thongbao', 'Đặt phòng thành công');
	}
	public function ThemVaoGioHang(Request $request, $id, $ngayden, $ngaydi) {
		$phong = Phong::where('MaPhong', $id)->first();
		$oldCart = Session('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->addPhong($phong, $id, $ngayden, $ngaydi);
		$request->session()->put('cart', $cart);
		return redirect()->back()->with('thongbao', 'Đặt phòng thành công');
	}
	public function danhSachPhongDat() {
		$cart = Session::get('cart');
		// Session::forget('cart');
		return view('client.danhsachphongdat', compact('cart'));
	}
	public function xoaPhongDat($id) {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->xoaPhong($id);
		if (count($cart->phongs) > 0) {
			Session::put('cart', $cart);
		} else {
			Session::forget('cart');
		}
		return redirect()->back();
	}
	public function xoaTatCaPhong() {
		Session::forget('cart');
		return redirect()->back();
	}
	public function thanhToan() {
		if (Auth::check()) {
			$user = Auth::user();
		}
		return view('client.thanhtoan', compact('user'));
	}
	public function postthanhToan(Request $request) {
		if (!Session::has('cart')) {
			return redirect()->route('client');
		}
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		dd($request->all());
		if ($request->LuaChon == 0) {
			$this->validate($request,
				[
					'TenKH' => 'required|max:40',
					'Email' => 'required|email',
					'DiaChi' => 'min:6|max:50',
					'SDT' => 'numeric',
				],
				[
					'Email.required' => 'Vui lòng nhập email',
					'Email.email' => 'Không đúng định dạng email',
					'TenKH.required' => 'Vui lòng nhập tên khách hàng',
					'TenKH.max' => 'Tên khách hàng không được vượt quá 40 kí tự',
					'DiaChi.min' => 'Địa chỉ ít nhất 6 kí tự',
					'DiaChi.max' => 'Địa chỉ không được vượt quá 50 kí tự',
					'SDT.numeric' => 'Nhập số điện thoại sai định dạng',
				]);
			$khachhang = KhachHang::create($request->all());
			$dondat = DatPhong::create([
				'MaKH' => $khachhang->id,
				'NgayDat' => Carbon::now(),
			]);
			foreach ($cart->phongs as $phong) {
				Phong::where('MaPhong', $phong['phong']->MaPhong)->update([
					'MaTT' => 2,
				]);
				Phong_DatPhong::create([
					'MaPhong' => $phong['phong']->MaPhong,
					'MaDat' => $dondat->id,
					'NgayDen' => $phong['ngayden'],
					'NgayDi' => $phong['ngaydi'],
					'MoTa' => '',
				]);
			}

		} elseif ($request->LuaChon == 1) {
			Stripe::setApiKey("sk_test_aBWzRKCBKy6L86mfuc3WqJgI");
			$token = $request->stripeToken;
			Charge::create([
				"amount" => $cart->tongTien,
				"currency" => "usd",
				"source" => $token, // obtained with Stripe.js
				"description" => "Charge",
			]);
		} else {
			return redirect()->back()->with('thongbao', 'Hãy chọn 1 trong 2 hình thức thanh toán');
		}
		Session::forget('cart');
		return redirect()->route('danh-sach-phong-dat')->with('thongbao', 'Bạn đã thanh toán thành công ! . Vui lòng kiểm tra mail để xác thực .');
	}
}
