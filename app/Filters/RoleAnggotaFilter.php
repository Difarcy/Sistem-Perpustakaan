<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleAnggotaFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('login') != true){
            session()->setFlashData('gagal', 'Anda Belum Login!');
            return redirect()->to('login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // jika role adalah 2 (anggota)
        if(session()->get('role') == 2 )
        {
            return redirect()->to('/dashboard');
        }
    }
}