<?php

namespace App\Http\Controllers\Admin;

use App\DAO\UserDAO;
use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;

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
}
