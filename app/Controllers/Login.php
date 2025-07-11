<?php namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->model = new UsersModel();
    }

	public function index()
	{
            echo view('layout/header');
            echo view('login');
            echo view('layout/footer');
    }

    public function login()
    {
        $getUsername = $this->request->getPost('username');
        $getPassword = $this->request->getPost('password');
        $getDatabaseUser = $this->model->where('username', $getUsername)->first();

        // Jika ada usernamenya
        if($getDatabaseUser){

            // jika passwordnya benar
            if(password_verify($getPassword, $getDatabaseUser['password'])){

                // tambahkan data session
                session()->set([
                                    'id' => $getDatabaseUser['id'],
                                    'no_anggota' => $getDatabaseUser['no_anggota'],
                                    'role' => $getDatabaseUser['role'],
                                    'nama' => $getDatabaseUser['nama'],
                                    'login' => true,
                                ]);
                $info = [
                            'nama' => $getDatabaseUser['nama'],
                        ];

                log_message('info', 'User {nama} Telah Login' , $info);

                session()->setFlashData('success', 'Berhasil Login');
                return redirect()->to('/dashboard');

            // jika passwordnya salah 
            } else {
                
                session()->setFlashData('gagal', 'Username Atau Password Salah');
                return redirect()->to('/login')->withInput();
            }
            
        // Jika usernamenya salah
        } else {
            session()->setFlashData('gagal', 'Username Atau Password Salah');
            return redirect()->to('/login')->withInput();
        }
    }
    
    
    public function logout()
    {   
        $getDatabaseEmail = $this->model->where('id', session()->get('id'))->first();

        $info = [
            'nama' => $getDatabaseEmail['nama'],
        ];

        log_message('info', 'User {nama} Telah Logout' , $info);


        // Logout
        $logout = session()->remove(['id', 'role', 'login']);
        session()->setFlashData('success', 'Berhasil Logout');
        return redirect()->to('/login');
    }


}
