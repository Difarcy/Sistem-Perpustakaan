<?php 

namespace App\Controllers;

use App\Models\BooksModel;

class GuestView extends BaseController
{
    public function __construct()
    {
        $this->bukuModel = new BooksModel();
    }

	public function index()
	{
        // $books = $this->bukuModel->find();
        // dd(  $books  );

		echo view('layout/header');
		echo view('guestview');
		echo view('layout/footer');
	}


}
