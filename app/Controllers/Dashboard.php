<?php 

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\DendaModel;
use App\Models\PeminjamanModel;
use App\Models\UsersModel;
use CodeIgniter\Database\Query;
use CodeIgniter\I18n\Time;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->userModel = new UsersModel();
		$this->booksModel = new BooksModel();
		$this->peminjamanModel = new PeminjamanModel();
		$this->dendaModel = new DendaModel();
		$this->time = new Time();
	}

	public function index()
	{
		// Jika yang login adalah Staff & Admin
		if (session()->get('role') <> 2){
			return $this->dashboardStaff();
		} else {
			return $this->dashboardUser();
		}
	}

	public function dashboardUser()
	{
		helper('number');
		// Get Data
			$no_anggota = session()->get('no_anggota');
			$getData = $this->peminjamanModel->getDashboardUser($no_anggota);
		
			$deadline = 0;
			if($getData){
				// Data Deadline
					$getDeadline = strtotime($getData['deadline']);
					setlocale(LC_ALL, 'id-ID', 'id_ID');
					$deadline = strftime("%A, %d %B %Y", $getDeadline);
			}
			// Data Denda yang belum dibayar
				$getDenda = $this->dendaModel->getDenda($no_anggota);
					$totalDenda = 0;
					foreach($getDenda as $denda){
						$totalDenda += $denda['denda'];
					}
					$totalDenda = number_to_currency($totalDenda, 'IDR', 'id-ID, id_ID');

			// Jumlah Buku Yang dipinjam
				$getPeminjaman = count($this->peminjamanModel->where(['no_anggota' => $no_anggota])->get()->getResultArray());

		$data = [
					'user' => $getData,
					'deadline' => $deadline,
					'totalDenda' => $totalDenda,
					'getPeminjaman' => $getPeminjaman,
				];

		return view('dashboard/dashboarduser', $data);
	}

	public function dashboardStaff()
	{
		// Filter data denda per bulan & Status 1 (udah bayar)
		// $getDataDenda = $this->dendaModel->where(['status' => 1])->get()->getResultArray();
		
		// Get Tahun ini
		$tahun = $this->time->getYear();
		$i = 1; 
		while($i < 13 )
		{ 										//Hitung denda 
			$query = $this->dendaModel->query("	SELECT SUM(denda) AS denda
												-- Dari tabel denda
												FROM denda 
												-- Dimana status = 1 (sudah dibayar)
												WHERE status = 1
												-- Berdasarkan bulan & tahun yang ditentukan 
												AND YEAR(updated_at) = '$tahun'
												AND MONTH(updated_at) = '$i'

											  ");
			$dataDenda[] = $query->getRowArray();
			$i++;
		}

		// Untuk mengubah Nilai null menjadi 0
		for($i = 0; $i < count($dataDenda); $i++)
		{
			if($dataDenda[$i]['denda'] == null ){
				$dataDenda[$i]['denda'] = 0;
			}
		}

		// Untuk looping semua data menjadi array berisi string
		foreach( $dataDenda as $denda){
			$dataDendaFix[] = $denda['denda'];
		}
		
		// dd(  $dataDenda  );
		// d(  $dataDendaFix  );
		// dd(  $bulan  );

		$jumlahUser = count($this->userModel->findAll());
		$jumlahBuku = count($this->booksModel->findAll());
		$jumlahJudulBuku = count($this->booksModel->groupBy('isbn')->get()->getResultArray());

		$data = [
					'jumlahUser' => $jumlahUser,
					'jumlahBuku' => $jumlahBuku,
					'jumlahJudulBuku' => $jumlahJudulBuku,
					'dataDenda' => $dataDendaFix,
					'tahun' => $tahun,
				];
				
		return view('dashboard/dashboardstaff', $data);
	}
}
