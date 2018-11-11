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
use Mail;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class ClientController extends Controller {
	function index() {
		return view('index');
	}
	function timKiemPhong(Request $request) {
		$this->validate($request,
			[
				'NgayDen' => 'required',
				'NgayDi' => 'required',
			],
			[
				'NgayDen.required' => "Nhập ngày đến",
				'NgayDi.required' => "Nhập ngày đi",
			]
		);
		$ngayden = Carbon::parse($request->NgayDen);
		$ngaydi = Carbon::parse($request->NgayDi);
		$now = Carbon::now();
		$tongNgay = (int) ($ngaydi->diffInDays($ngayden));
		$parse = (int) ($now->diffInDays($ngayden));
		if ($tongNgay > 0 || $parse > 0) {
			return redirect()->back()->with("thongbao", 'Thông tin ngày đến hoặc ngày đi không hợp lệ !');
		}
		$tenLoai = '';
		$phongs = PhongDAO::timKiemPhong($request->MaLoai);
		if ($request->MaLoai != null) {
			$tenLoai = LoaiPhong::where('MaLoai', $request->MaLoai)->first()->TenLoai;
		}
		foreach ($phongs as $phong) {
			if ($phong->NgayDi == null && $phong->NgayDen = null) {
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
	function sendMail(Request $request) {
		$this->validate($request,
			[
				'name' => 'required|max:40',
				'email' => 'required|email',
				'subject' => 'required|min:6',
				'message' => 'required',
			],
			[
				'name.required' => 'Vui lòng nhập tên',
				'name.max' => 'Tên không vượt quá 40 ký tự',
				'email.email' => 'Không đúng định dạng email',
				'email.required' => 'Vui lòng nhập email',
				'subject.required' => 'Vui lòng nhập tiêu đề',
				'subject.min' => 'Tiêu đề ít nhất 6 kí tự',
				'message.marequiredx' => 'Nhập nội dung',
			]);
		$name = $request->get('name');
		$email = $request->get('email');
		$subject = $request->get('subject');
		$message = $request->get('message');
		Mail::send('client.noidungmail', ['name' => $name, 'email' => $email, 'subject' => $subject, 'bodyMessage' => $message], function ($mes) use ($request) {
			$mes->from($request['email'], $request['name']);
			$mes->to('levan.hy.97@gmail.com', 'Admin')->subject('Royal Hotel');
		});
		return redirect()->back()->with('thongbao', 'Thư đã được gửi đến cho Admin ! Chúng tôi sẽ gửi mail phản hồi sớm nhất cho bạn !!!');
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
		$this->validate($request,
			[
				'NgayDen' => 'required',
				'NgayDi' => 'required',
			],
			[
				'NgayDen.required' => "Nhập ngày đến",
				'NgayDi.required' => "Nhập ngày đi",
			]
		);
		$ngayden = Carbon::parse($request->NgayDen);
		$ngaydi = Carbon::parse($request->NgayDi);
		$now = Carbon::now();
		$tongNgay = (int) ($ngaydi->diffInDays($ngayden));
		$parse = (int) ($now->diffInDays($ngayden));
		if ($tongNgay > 0 || $parse > 0) {
			return redirect()->back()->with("thongbao", 'Thông tin ngày đến hoặc ngày đi không hợp lệ !');
		}
		$loaiPhong = LoaiPhong::where('MaLoai', $request->MaLoai)->first();
		$phongs = PhongDAO::timKiemPhong($loaiPhong->MaLoai);
		foreach ($phongs as $phong) {
			if ($phong->NgayDi == null && $phong->NgayDen = null) {
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
			$khachhang = KhachHang::create([
				'TenKH' => $request->TenKH,
				'Email' => $request->Email,
				'DiaChi' => $request->DiaChi,
				'SDT' => $request->SDT,
			]);
			$dondat = DatPhong::create([
				'MaKH' => $khachhang->id,
				'TongTien' => $cart->tongTien,
				'NgayDat' => Carbon::now(),
			]);

		} elseif ($request->LuaChon == 1) {
			Stripe::setApiKey("sk_test_aBWzRKCBKy6L86mfuc3WqJgI");
			$token = $request->stripeToken;
			$stripe = Charge::create([
				"amount" => $cart->tongTien,
				"currency" => "usd",
				"source" => $token, // obtained with Stripe.js
				"description" => "Charge",
			]);
			$khachhang = KhachHang::create([
				'SoThe' => $stripe->source->last4 . '_' . Carbon::now(),
			]);
			$dondat = DatPhong::create([
				'MaKH' => $khachhang->id,
				'TongTien' => $cart->tongTien,
				'NgayDat' => Carbon::now(),
			]);
		} else {
			return redirect()->back()->with('thongbao', 'Hãy chọn 1 trong 2 hình thức thanh toán');
		}
		foreach ($cart->phongs as $phong) {
			$date = Carbon::now()->format('Y-M-d');
			$NgayDen = Carbon::parse($phong['ngayden'])->format('Y-M-d');
			if ($date == $NgayDen) {
				Phong::where('MaPhong', $phong['phong']->MaPhong)->update([
					'MaTT' => 3,
				]);
			} else {
				Phong::where('MaPhong', $phong['phong']->MaPhong)->update([
					'MaTT' => 2,
				]);
			}

			Phong_DatPhong::create([
				'MaPhong' => $phong['phong']->MaPhong,
				'MaDat' => $dondat->id,
				'NgayDen' => $phong['ngayden'],
				'NgayDi' => $phong['ngaydi'],
				'SoNgay' => (int) (Carbon::parse($phong['ngaydi'])->diffInDays(Carbon::parse($phong['ngayden']))),
			]);
		}
		Session::forget('cart');
		return redirect()->back()->with('thongbao', 'Bạn đã thanh toán thành công ! .');
	}

}
