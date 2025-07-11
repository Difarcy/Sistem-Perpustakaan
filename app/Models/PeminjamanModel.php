<?php 

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table      = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['id_buku', 'no_anggota', 'status', 'deadline', 'tanggal_peminjaman'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;
    
    public function getDataPeminjaman()
    {
        return $this->join('buku', 'peminjaman.id_buku = buku.id')
                    ->join('user', 'peminjaman.no_anggota = user.no_anggota');
    }

    public function search($keyword)
    {
        return $this->join('buku', 'peminjaman.id_buku = buku.id')
                    ->join('user', 'peminjaman.no_anggota = user.no_anggota')
                    ->groupStart()
                        ->like('judul', $keyword)
                        ->orLike('nama', $keyword)
                        ->orLike('peminjaman.no_anggota', $keyword)
                        ->orLike('id_buku', $keyword)
                    ->groupEnd()
                    ->where('deleted_at', null);
                    
    }
    
    public function searchDeleted($keyword)
    {
        return $this->join('buku', 'peminjaman.id_buku = buku.id')
                    ->join('user', 'peminjaman.no_anggota = user.no_anggota')
                    ->groupStart()
                        ->like('judul', $keyword)
                        ->orLike('nama', $keyword)
                        ->orLike('peminjaman.no_anggota', $keyword)
                        ->orLike('id_buku', $keyword)
                    ->groupEnd();
    }

    public function getDashboardUser($id)
    {
        return $this->join('buku', 'peminjaman.id_buku = buku.id')
                    ->join('user', 'peminjaman.no_anggota = user.no_anggota')
                    ->groupStart()
                        ->where(['peminjaman.no_anggota' => $id])
                    ->groupEnd()
                        ->where(['peminjaman.deleted_at' => null ])
                    ->get()->getRowArray();
    }
}