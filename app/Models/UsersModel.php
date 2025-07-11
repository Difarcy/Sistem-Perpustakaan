<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['no_anggota', 'nama', 'jenis_kelamin', 'no_telp', 'ttl', 'profil', 'email', 'username', 'password', 'role',];
    protected $useTimestamps = True;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllUsers()
    {  
        return $this->findAll();
    }

    public function search($keyword)
    {
        return $this->like('no_anggota', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('email', $keyword)
            ->orLike('username', $keyword);
    }

    public function getById($id)
    {
        return $this->where('id', $id)->get()->getRowArray();
    }

    public function SearchByAnggota($keyword)
    {
        return $this->groupStart()
            ->like('no_anggota', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('email', $keyword)
            ->orLike('username', $keyword)
            ->groupEnd()
            ->where('role', 2);
    }

    
}