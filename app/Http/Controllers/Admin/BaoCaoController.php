<?php

namespace App\Http\Controllers\Admin;

use App\Charts\SampleChart;
use App\DAO\ThongKeKhachDAO;
use App\DAO\ThongTinPhongDAO;
use App\Http\Controllers\Controller;

class BaoCaoController extends Controller {
	public function index() {
		$chart = new SampleChart;
		$chart->labels(['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']);
		$doanhthu = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		$slkhach = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		$sltheothang = ThongKeKhachDAO::soKhachDatTheoThang();
		$tongtien = ThongTinPhongDAO::tongTienTheoThang();
		foreach ($sltheothang as $key => $item) {
			$slkhach[$item->Thang - 1] = $item->sl_dat;
		}
		foreach ($tongtien as $key => $item) {
			$doanhthu[$item->Thang - 1] = $item->tien;
		}
		$chart->dataset('Doanh thu theo tháng', 'line', $doanhthu)->options([
			'color' => '#F9E82C',
		]);
		$chart->dataset('Số lượng khách đặt phòng', 'line', $slkhach)->options([
			'color' => '#2DB3F9',
		]);
		return view('admin.baocao', compact('chart'));
	}
}
