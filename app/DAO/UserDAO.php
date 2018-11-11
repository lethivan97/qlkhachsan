<?php
namespace App\DAO;
use Illuminate\Support\Facades\DB;

class UserDAO {

	public function filterByName($name) {
		$result = DB::table('Users')->where('name', 'like', '%' . $name . '%');
		return $result;
	}

	public function getById($id) {
		$result = DB::table('Users');
		if ($id != "") {
			$result = $result->where('id', '=', $id);
		}
		return $result->select('id', 'name', 'email', 'role')->orderBy('name', 'desc');
	}
}

?>
