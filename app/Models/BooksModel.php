<?php 

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table      = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['isbn', 'judul', 'pengarang', 'penerbit', 'section', 'status', 'cover'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    //  mengganti format created & updated menjadi date
    protected $dateformat = 'date';


    public function getAllBooks()
    {
        return $this->findAll();
    }

    public function getAllDataByIsbn($isbn)
    {
        return $this->getWhere(['isbn' => $isbn])->getResultArray();
    }

    public function getByIsbn($isbn)
    {
        return $this->where(['isbn' => $isbn])->get()->getRowArray();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->get()->getRowArray();
    }
  
    public function deleteData($id)
    {
        return $this->where(['id' => $id])->delete();
    }
    
    public function search($keyword)
    {
        return $this->like('isbn', $keyword)->orLike('judul', $keyword);
        // bisa pakai ->groupBy
        // return $this->like('isbn', $keyword)->orLike('judul', $keyword)->groupBy('isbn');
    }

    public function searchByScrap($keyword)
    {
        return $this->groupStart()
                        ->like('isbn', $keyword)
                        ->orLike('judul', $keyword)
                    ->groupEnd()
                    ->where('status', 'rusak');
    }

    public function searchByLost($keyword)
    {
        return $this->groupStart()
                        ->like('isbn', $keyword)
                        ->orLike('judul', $keyword)
                    ->groupEnd()
                    ->where('status', 'hilang');
    }

    public function searchByTersedia($keyword)
    {
        return $this->groupStart()
                        ->like('isbn', $keyword)
                        ->orLike('judul', $keyword)
                    ->groupEnd()
                    ->where('status', 'tersedia');
    }
   
}
