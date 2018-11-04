<?php
namespace App\DAO;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserDAO {

	public function filterByName($name) {
		$result = DB::table('Users')->where('name', 'like', '%' . $name . '%');
		return $result;
	}

	public function getById($id) {
		// $result = DB::table('Phong');
		$result = DB::table('Users');
		if ($id != "") {
			$result = $result->where('id', '=', $id);
		}
		return $result->select('id','name', 'email', 'role')->orderBy('name', 'desc');
	}
}

	
?>
