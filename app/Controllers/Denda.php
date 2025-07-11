<?php

namespace App\Controllers;
use App\Models\DendaModel;
use App\Models\PeminjamanModel;
use CodeIgniter\I18n\Time;

class Denda extends BaseController
{
    public function __construct()
    {
        $this->model = new DendaModel();
        $this->peminjamanModel = new PeminjamanModel();
        $this->time = new Time();
    }

	public function index()
	{
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $result = $this->model->search($keyword);
        } else {
            $result = $this->model->getData();
            // dd($result = $this->model->getData()->get()->getResultArray());
        }

        $DataPerPage = 6;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;

        $data = [
                    'denda' => $result->where(['denda.status' => 0])->paginate($DataPerPage),
                    'DataPerPage' => $DataPerPage,
                    'currentPage' => $getHalaman,
                ];

		return view('denda/index', $data);
	}

    public function detail($id)
    {
        $data = [
            'denda' => $this->model->getData()->where('id_denda' , $id)->first()
        ];
        return view('denda/detail', $data);
    }

    public function bayar($id)
    {   
        helper('number');
        // ambil data tabel peminjaman, user, buku

        $getData = $this->model->getDataAllTabel()->where('id_denda', $id)->first();

        $getDeadline = strtotime($getData['deadline']);
        $unixTime = strtotime($getData['tanggal_peminjaman']);

        // Set waktu ke region indonesia, id-ID = untuk windows, id_ID = untuk linux
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        // Ubah keformat Date
        $tanggal = strftime("%A, %d %B %Y", $unixTime);
        $deadline = strftime("%A, %d %B %Y", $getDeadline);
        $currency = number_to_currency($getData['denda'], 'IDR', 'id-ID, id_ID');

        switch ($getData['denda']) {
            case 50000:
                $statusDenda = "Rusak";
            break;
            case 75000:
                $statusDenda = "Hilang";
            break;
            default:
                $statusDenda = "Melebihi Deadline";
                break;
        }
        
        $data = [
                    'denda' => $getData,
                    'tanggal' => $tanggal,
                    'deadline' => $deadline,
                    'currency' => $currency,
                    'statusDenda' => $statusDenda,
                ];
            // dd($data);
        return view('denda/bayar', $data);

    }

    public function saveBayar($id)
    {
        // Ubah Status denda menjadi 1
        $this->model->save([
            'id_denda' => $id,
            'status' => 1,
            ]);
        
        session()->setFlashData('success', 'Denda Berhasil Dibayar!');
        return redirect()->to('/denda');
    }

}
