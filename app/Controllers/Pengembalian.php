<?php 

namespace App\Controllers;
use App\Models\PeminjamanModel;

class Pengembalian extends BaseController
{
    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
    }

	public function index()
	{

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $result = $this->peminjamanModel->searchDeleted($keyword)->onlyDeleted();
        } else {
            $result = $this->peminjamanModel->getDataPeminjaman();
        }

        $DataPerPage = 6;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;

        $data = [
                    'peminjaman' => $result->onlyDeleted()->paginate($DataPerPage),
                    'DataPerPage' => $DataPerPage,
                    'currentPage' => $getHalaman,
                ];

		return view('pengembalian/index', $data);
	}

    public function detail($id)
    {
        $getData = $this->peminjamanModel->getDataPeminjaman()->where('id_peminjaman', $id)->get()->getRowArray();
        $unixTime = strtotime($getData['tanggal_peminjaman']);
        $getPengembalianDate = strtotime($getData['deleted_at']);

        // Set waktu ke region indonesia, id-ID = untuk windows, id_ID = untuk linux
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        // Ubah keformat Date
        $tanggal = strftime("%A, %d %B %Y", $unixTime);
        $datePengembalian = strftime("%A, %d %B %Y", $getPengembalianDate);

        $data = [
                    'pinjam' => $getData,
                    'tanggal' => $tanggal,
                    'datePengembalian' => $datePengembalian,
                ];
            // dd($data);
        return view('pengembalian/detail', $data);
    }
}
