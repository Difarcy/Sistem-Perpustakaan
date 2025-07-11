<?php 

namespace App\Models;
use CodeIgniter\Model;

class DendaModel extends Model
{
    protected $table      = 'denda';
    protected $primaryKey = 'id_denda';
    protected $allowedFields = ['id_buku', 'no_anggota', 'denda', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    public function getData()
    {
        return $this->join('buku', 'denda.id_buku = buku.id')
                    ->join('user', 'denda.no_anggota = user.no_anggota');
    }

    public function getDataAllTabel()
    {
        return $this->join('buku', 'denda.id_buku = buku.id')
                    ->join('user', 'denda.no_anggota = user.no_anggota')
                    ->join('peminjaman', 'denda.no_anggota = peminjaman.no_anggota');
    }

    public function search($keyword)
    {
        return $this->join('buku', 'denda.id_buku = buku.id')
                    ->join('user', 'denda.no_anggota = user.no_anggota')
                    ->groupStart()
                    ->like('judul', $keyword)
                    ->orLike('nama', $keyword)
                    ->orLike('user.no_anggota', $keyword)
                    ->orLike('id_buku', $keyword)
                    ->groupEnd();
                    
    }

    public function getDenda($id)
    {
        return $this->groupStart()
                        ->where(['no_anggota' => $id])
                    ->groupEnd()
                    ->where(['status' => 0])
                    ->get()->getResultArray();
    }
}