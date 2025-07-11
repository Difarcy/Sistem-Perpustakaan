<?php 

namespace App\Controllers;
use App\Models\BooksModel;

class Books extends BaseController
{
    public function __construct()
    {
        // load model agar bisa dipakai di controller ini
        $this->model = new BooksModel();
    }
    
	public function index()
	{
        // ambil data url agar redirect kembali ke halaman ini setelah update data
        $uri = current_url();
        $uriSegment = session()->set(['uri' => $uri]);

        $keyword = $this->request->getVar('keyword');
        
        if($keyword){
            $result = $this->model->searchByTersedia($keyword);
        } else {
            $result = $this->model->where('status', 'tersedia');
        }

        $pagePerView = 6;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;
        $data = [
            // pagination
            'books' => $result->paginate($pagePerView, 'buku'),
            'pager' => $this->model->pager,
            'currentPage' => $getHalaman,
            'pagePerView' => $pagePerView,
            'validation' => \Config\Services::validation()
        ];
        
		return view('buku/index', $data);
    }
    
    public function detail($id)
    {
        $findBook = $this->model->getById($id);
        $data = [
                    'book' => $findBook
                ];
        return view('buku/detail', $data);
    }

    public function delete($id)
    {
        $findId = $this->model->getById($id);
        $getIsbn = $findId['isbn'];
        $countData = count($this->model->getAllDataByIsbn($getIsbn));
        
            if ($countData == 1){
                if($findId['cover'] != 'no-cover.png'){
                    unlink('covers/'.$findId['cover']);
                }
                $this->model->deleteData($id);
                
            } else {
                $this->model->deleteData($id);
            }
        
        
        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->back();
    }

    public function add()
    {
        // jika dapat data + Validasi sukses
        if($this->request->getPost() && $this->validate([
            'isbn' => 'required|numeric|max_length[20]',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'section' => 'required|max_length[20]',
        ]))
        {   

            $getIsbn = $this->model->getByIsbn($this->request->getPost('isbn'));
            $statusBuku = "Tersedia";
            if($getIsbn){
                
                $namaCover = $getIsbn['cover'];
                $this->model->save([

                    'isbn' => $getIsbn['isbn'],
                    'judul' => $getIsbn['judul'],
                    'pengarang' => $getIsbn['pengarang'],
                    'penerbit' => $getIsbn['penerbit'],
                    'section' => $this->request->getPost('section'),
                    'status' => $statusBuku,
                    'cover' => $namaCover
                ]);
                
            } else {
                $cover = $this->request->getFile('cover');
                if($cover->getError() == 4){

                    $namaCover = 'no-cover.png';

                } else {
                    
                    $namaCover = $cover->getRandomName();
                    $cover->move('covers', $namaCover);
                }

                $this->model->save([
                    'isbn' => $this->request->getPost('isbn'),
                    'judul' => $this->request->getPost('judul'),
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'section' => $this->request->getPost('section'),
                    'status' => $statusBuku,
                    'cover' => $namaCover
                ]);
            }

            // stauts default buku = tersedia
           
        
            
            session()->setFlashdata('success', 'Data buku Berhasil Ditambahkan');
            return redirect()->to('/books');
            
        } else {
            session()->setFlashdata('gagal', 'Data buku gagal Ditambahkan');
            return redirect()->back()->withInput();
        }
        
    }

    public function edit($id)
    {

        $status = ['Tersedia', 'Hilang', 'Rusak'];

        $data = [
            'book' => $this->model->getById($id),
            'status' => $status,
            'validation' => \Config\Services::validation()
        ];
        
		return view('buku/edit', $data);
    }

    public function update($id)
    {
        if($this->request->getPost() && $this->validate([
            'section' => 'required|max_length[20]',
        ]))
        {   
           $segment = session()->get('uri');
            $this->model->save([
                // tambahkan id yang akan diupdate
                'id' => $id,
                'section' => $this->request->getPost('section'),
                'status' => $this->request->getPost('status'),
            ]);

            session()->setFlashdata('success', 'Data buku Berhasil Diubah');
            return redirect()->to($segment);
            
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function byIsbn()
    {
        // ambil data url agar redirect kembali ke halaman ini setelah update data
        $uri = current_url();
        $uriSegment = session()->set(['uri' => $uri]);
        
        $keyword = $this->request->getVar('keyword');

        if($keyword){
            $result = $this->model->search($keyword)->groupBy('isbn');
        } else {
            $result = $this->model->groupBy('isbn');
        }

        $pagePerView = 6;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;
        $data = [
            // pagination
            'books' => $result->paginate($pagePerView, 'buku'),
            // 'books' => $result,
            'pager' => $this->model->pager,
            'currentPage' => $getHalaman,
            'pagePerView' => $pagePerView,
        ];
        
        return view('buku/isbn', $data);
    }

    public function detailIsbn($isbn)
    {
        // ambil data url agar redirect kembali ke halaman ini setelah update data
        $uri = current_url();
        $uriSegment = session()->set(['uri' => $uri]);

        $getData = $this->model->getByIsbn($isbn);

        $pagePerView = 4;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;
        $data = [
            // pagination
            'book' => $getData,
            'books' => $this->model->search($isbn)->paginate($pagePerView, 'buku'),
            'pager' => $this->model->pager,
            'currentPage' => $getHalaman,
            'pagePerView' => $pagePerView,
            'validation' => \Config\Services::validation()
        ];
        return view('buku/detailisbn', $data);
    }

    public function editIsbn($isbn)
    {

        $data = [
            'book' => $this->model->getByIsbn($isbn),
            'validation' => \Config\Services::validation()
        ];
        
		return view('buku/editisbn', $data);
    }

    public function updateIsbn()
    {

        $segment = session()->get('uri');

        if($this->request->getPost() && $this->validate([
            'isbn' => 'required|numeric|max_length[20]',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
        ]))
        {   
            $cover = $this->request->getFile('cover');
            if($cover->getError() == 4){

                $namaCover = $this->request->getPost('oldCover');

            } else {
                unlink('covers/'.$this->request->getPost('oldCover'));
                $namaCover = $cover->getRandomName();
                $cover->move('covers', $namaCover);
            }

            // GET inputan
           $isbn = $this->request->getPost('isbn');
           $judul = $this->request->getPost('judul');
           $pengarang = $this->request->getPost('pengarang');
           $penerbit = $this->request->getPost('penerbit');

           $allIsbn = $this->model->Where('isbn', $isbn)->get()->getResultArray();
           $jumlahDataIsbn = count($allIsbn);

           for($i = 0; $i < $jumlahDataIsbn; $i++ )
           {
               $this->model->save([
                // tambahkan id yang akan diupdate
                'id' => $allIsbn[$i]['id'],
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'cover' => $namaCover
            ]);
           }
           
            session()->setFlashdata('success', 'Data Isbn Berhasil Diubah');
            return redirect()->to($segment);
            
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function byLost()
    {
        // ambil data url agar redirect kembali ke halaman ini setelah update data
        $uri = current_url();
        $uriSegment = session()->set(['uri' => $uri]);
        
        $keyword = $this->request->getVar('keyword');

        if($keyword){
            $result = $this->model->searchByLost($keyword);
        } else {
            $result = $this->model->where('status', 'Hilang');
        }

        $pagePerView = 6;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;
        $data = [
            // pagination
            'books' => $result->paginate($pagePerView, 'buku'),
            // 'books' => $result,
            'pager' => $this->model->pager,
            'currentPage' => $getHalaman,
            'pagePerView' => $pagePerView,
        ];
        
        return view('buku/lostbook', $data);
    }

    public function byScrap()
    {
        // ambil data url agar redirect kembali ke halaman ini setelah update data
        $uri = current_url();
        $uriSegment = session()->set(['uri' => $uri]);
        
        $keyword = $this->request->getVar('keyword');

        if($keyword){
            $result = $this->model->searchByScrap($keyword);
        } else {
            $result = $this->model->where('status', 'Rusak');
        }

        $pagePerView = 6;
        // ambil halaman dari url
        $getHalaman = ($this->request->getVar('page_buku'))? $this->request->getVar('page_buku') : 1;
        $data = [
            // pagination
            'books' => $result->paginate($pagePerView, 'buku'),
            // 'books' => $result,
            'pager' => $this->model->pager,
            'currentPage' => $getHalaman,
            'pagePerView' => $pagePerView,
        ];
        
        return view('buku/byscrap', $data);
    }



}
