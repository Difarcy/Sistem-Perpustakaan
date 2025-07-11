<?php 

namespace App\Controllers;
use App\Models\PeminjamanModel;
use App\Models\UsersModel;
use App\Models\BooksModel;
use App\Models\DendaModel;
use CodeIgniter\I18n\Time;

class Peminjaman extends BaseController
{
    public function __construct()
    {
        $this->model = new PeminjamanModel();
        $this->bukuModel = new BooksModel();
        $this->userModel = new UsersModel();
        $this->dendaModel = new DendaModel();
        $this->time = new Time();
    }

	public function index()
	{
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $result = $this->model->search($keyword);
        } else {
            $result = $this->model->getDataPeminjaman();
        }

        $DataPerPage = 6;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;

        $data = [
                    'peminjaman' => $result->paginate($DataPerPage),
                    'DataPerPage' => $DataPerPage,
                    'currentPage' => $getHalaman,
                ];

		return view('peminjaman/index', $data);
    }
    
    public function detail($id)
    {
        $getData = $this->model->getDataPeminjaman()->where('id_peminjaman', $id)->first();

        $unixTime = strtotime($getData['tanggal_peminjaman']);
        $getDeadline = strtotime($getData['deadline']);

        // Set waktu ke region indonesia, id-ID = untuk windows, id_ID = untuk linux
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        // Ubah keformat Date
        $tanggal = strftime("%A, %d %B %Y", $unixTime);
        $deadline = strftime("%A, %d %B %Y", $getDeadline);

        $data = [
                    'pinjam' => $getData,
                    'tanggal' => $tanggal,
                    'deadline' => $deadline,
                ];
            // dd($data);
        return view('peminjaman/detail', $data);
    }

    public function delete($id)
    {
        $getDataPeminjaman = $this->model->where('id_peminjaman', $id)->get()->getRowArray();

        $this->model->delete(['id_peminjaman' => $id]);

        // cari dulu id buku
        $getBuku = $this->bukuModel->where('id', $getDataPeminjaman['id_buku'])->first();
        $this->bukuModel->save([
            'id' => $getBuku,
            'status' => 'Tersedia',
        ]);

        session()->setFlashData('success', 'Data Peminjaman Berhasil Dihapus');
        return redirect()->back();
    }

    public function add()
    {
        helper('date');
        helper('number');

        if($this->request->getPost()){
            $getBuku = $this->bukuModel->where('id', $this->request->getPost('id_buku'))->first();
            $getUser = $this->userModel->where('no_anggota', $this->request->getPost('id_user'))->first();

            $date = date('Y-m-d H:i:s');
            // jika ada input date
            if($this->request->getPost('date')){
                $unixTime = strtotime($this->request->getPost('date'));
                $date = date('Y-m-d H:i:s', $unixTime);
            }

            // jika ID buku tidak ditemukan
            if(!$getBuku){
                session()->setFlashData('gagal', "Data Buku tidak ditemukan!");
                return redirect()->back();
            }

            // jika ID User tidak ditemukan
            if(!$getUser){
                session()->setFlashData('gagal', "Data User tidak ditemukan!");
                return redirect()->back();
            }

            // Ambil data denda dari tabel denda berdasarkan id user
            $getDenda = $this->dendaModel->getDenda($this->request->getPost('id_user'));
            // Jika denda user lebih dari 100K
            if($getDenda){
                // inisialisasi denda
                $totalDenda = 0;
                foreach($getDenda as $denda){
                    // Tambahkan semua denda
                    $totalDenda += $denda['denda'];
                }
                if($totalDenda > 100000){
                    // Ubah ke bentuk IDR
                    $dendaUser = number_to_currency($totalDenda, 'IDR');
                    session()->setFlashData('gagal', "User punya denda sebesar ".$dendaUser);
                    return redirect()->back();
                }

            }

            // Jika User sudah pernah minjam buku
            if($this->model->where('no_anggota', $this->request->getPost('id_user'))->first()){
                session()->setFlashData('gagal', "User belum mengembalikkan buku sebelumnya!");
                return redirect()->back();
            }

            // Buku Berdasarkan Status
            switch ($getBuku['status']) {
                case 'Hilang':
                    session()->setFlashData('gagal', "Ini adalah buku hilang");
                    return redirect()->back();
                    break;
                case 'Rusak':
                    session()->setFlashData('gagal', "Ini adalah buku Rusak");
                    return redirect()->back();
                    break;
                case 'Dipinjam':
                    session()->setFlashData('gagal', "Buku Ini Sedang Dipinjam");
                    return redirect()->back();
                    break;

                default:
                    break;
            }

            // Buat Deadline
            $deadline = strtotime($date); 
            $deadline = strtotime('+1 week', $deadline);
            $deadline = date('Y-m-d H:i:s', $deadline);

            // Save data ke tabel peminjaman
            $this->model->save([
                'id_buku' => $this->request->getPost('id_buku'),
                'no_anggota' => $this->request->getPost('id_user'),
                'tanggal_peminjaman' => $date,
                'deadline' => $deadline,
            ]);

            $this->bukuModel->save([
                'id' => $this->request->getPost('id_buku'),
                'status' => 'Dipinjam',
            ]);

            session()->setFlashData('success', "Data peminjaman berhasil ditambahkan");
            return redirect()->to('/peminjaman');
        }

        return view('peminjaman/add');

        
    }

    public function pengembalian($id)
    {
        $getData = $this->model->getDataPeminjaman()->where('id_peminjaman', $id)->first();
        $getDeadline = strtotime($getData['deadline']);
        $getDenda = strtotime($this->time->now());

        $unixTime = strtotime($getData['tanggal_peminjaman']);

        // Set waktu ke region indonesia, id-ID = untuk windows, id_ID = untuk linux
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        // Ubah keformat Date
        $tanggal = strftime("%A, %d %B %Y", $unixTime);
        $deadline = strftime("%A, %d %B %Y", $getDeadline);

        $denda = 0;
        if($getDenda > $getDeadline){
            $denda = 5000;
        }

        $data = [
                    'pinjam' => $getData,
                    'tanggal' => $tanggal,
                    'deadline' => $deadline,
                    'denda' => $denda,
                ];
            // dd($data);
        return view('peminjaman/return', $data);
    }

    public function savePengembalian($id)
    {
        // Get 3 table Data by id_peminjaman
        $getData = $this->model->getDataPeminjaman()->where('id_peminjaman', $id)->first();
        
        // Get Status Buku
        $status = $this->request->getVar('status');
        $dendaDeadline = $this->request->getVar('deadline');
        
        // Tambah data denda ( jika buku hilang)
        if($status == 'Hilang'){
            $this->dendaModel->save([
                'no_anggota' => $getData['no_anggota'],
                'id_buku' => $getData['id_buku'],
                'denda' => 75000,
                'status' => 0,
                ]);
            } 
            
        // Tambah data denda ( jika buku rusak)
        if($status == 'Rusak'){
            $this->dendaModel->save([
            'no_anggota' => $getData['no_anggota'],
            'id_buku' => $getData['id_buku'],
            'denda' => 50000,
            'status' => 0,
            ]);
         }
        
        // Tambah data denda ( jika melebihi Deadline)
        if($this->request->getVar('deadline')){
            $this->dendaModel->save([
            'no_anggota' => $getData['no_anggota'],
            'id_buku' => $getData['id_buku'],
            'denda' => $dendaDeadline,
            'status' => 0,
            ]);
         }

        // Update data di tabel buku
        $this->bukuModel->save([
                'id' => $getData['id_buku'],
                'status' => $status
        ]);

        // Delete data dari tabel peminjaman (softdelete)
        $this->model->delete(['id_peminjaman' => $id]);
        
        session()->setFlashData('success', "Buku Berhasil Dikembalikkan");
        return redirect()->to('/peminjaman');
    }

    public function riwayat()
    {
        $no_anggota = session()->get('no_anggota');
        $result = $this->model->where('no_anggota', $no_anggota)->orderBy('tanggal_peminjaman', 'DESC')->findAll();
        $data = [
            'riwayat' => $result
        ];
        return view('peminjaman/riwayat', $data);
    }


}
