<?php

namespace App\Http\Controllers\Admin;

use App\DAO\UserDAO;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
	public function index() {
		return view('admin');
	}
	public function danhSachUser(Request $request) {
		$userDAO = new UserDAO();
		$result = $userDAO->getById('')->paginate(10);
		return view('admin.user.user', ['users' => $result]);
	}
	public function deleteUser(Request $request) {
		dd($request->all());
	}

	public function xoaUser($id) {
		User::where('id', $id)->delete();
		return redirect()->route('admin.user');
	}
	public function chiTietUser($id) {
		$user = User::where('id', $id)->first();

		return view('admin.user.sua-user', compact('user'));
	}
	public function savechiTietUser($id, Request $request) {
		$this->validate($request,
			[
				'password' => 'required',
				'new_password' => 'required|min:6',
				're_new_password' => 'required|min:6|same:new_password',
			],
			[
				'password.required' => 'Nhập password',
				'new_password.required' => 'Nhập password mới',
				'new_password.min' => "Password chứa ít nhất 6 ký tự",
				'new_password.required' => "Nhập xác nhận Password",
				're_new_password.min' => "Password chứa ít nhất 6 ký tự",
				're_new_password.same' => "Password không khớp",
			]
		);
		$user = User::find($id);
		if ($user && password_verify($request->password, $user->password)) {
			if ($request->new_password === $request->re_new_password) {
				User::find($id)->update([
					'password' => Hash::make($request->new_password),
				]);
				return redirect()->back()->with('thongbao', 'Thay đổi password thành công !');
			}
		} else {
			return redirect()->back()->with('thongbao', 'Password không đúng');
		}
		return redirect()->route('admin.user');
	}

}
?>