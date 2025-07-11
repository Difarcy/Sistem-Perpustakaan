<?php namespace App\Controllers;

use App\Models\UsersModel;

class Staff extends BaseController
{
    public function __construct()
    {
        $this->model = new UsersModel();
    }

	public function index()
	{
        $data = [
                    'users' => $this->model->where('role', 1)->get()->getResultArray()
                ];

		return view('staff/index', $data);
    }
    
    public function addStaff()
    {
        $data = [
                    'validation' => \Config\Services::validation()
                ];

        return view('staff/addstaff', $data);
    }

    public function add()
    {
        if($this->request->getPost() && $this->validate([
            'nama' => 'required',
            'noTelp' => 'required|numeric',
            'tempat' => 'required',
            'tanggal' => 'required',
            'email' => 'is_unique[user.email]|valid_email',
            'profil' => 'is_image[profil]|max_size[profil,3062]'
        ])){
            // buat tanggal ke unix time stamp - ubah kembali
            $unixTime = strtotime($this->request->getPost('tanggal'));
            $tanggal = date('d-m-Y', $unixTime);
            $ttl = $this->request->getPost('tempat').', '. $tanggal;
            
            // bikin id random
            $no_anggota = date('ymd').rand(1, 99999);

            // HASH password
            $password = password_hash( date('dmy', $unixTime), PASSWORD_DEFAULT);
            // upload profile
            $profil = $this->request->getFile('profil');
            if($profil->getError() == 4){
                $profilName = 'no-profil.png';
            } else {
                $profilName = $profil->getRandomName();
                $profil->move('profile', $profilName);
            }

            $this->model->save([
                'no_anggota' => $no_anggota,
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('status'),
                'no_telp' => $this->request->getPost('noTelp'),
                'ttl' => $ttl,
                'profil' => $profilName,
                'email' => $this->request->getPost('email'),
                'password' => $password,
                'role' => 1
            ]);
            session()->setFlashData('success', 'Data Staff Berhasil Ditambahkan');
            return redirect()->to('/staff');

        } else {

            return redirect()->back()->withInput();
        }
    }

    public function detail($id)
    {
        $data = ['user' => $this->model->getById($id)];

        return view('staff/detail', $data);
    }

    public function delete($id)
    {
        $dataUser = $this->model->getById($id);

        if($dataUser['profil'] != 'no-profile.png'){
            unlink('profile/'.$dataUser['profil']);
        }
        $this->model->delete(['id' => $id]);
        
        session()->setFlashData('success', "Data User berhasil dihapus");
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
                    'user' => $this->model->getById($id),
                    'validation' => \Config\Services::validation()
                ];
        return view('staff/edit', $data);
    }

    public function update($id)
    {
        if($this->request->getPost() && $this->validate([
            'nama' => 'required',
            'no_telp' => 'required|numeric',
            'profil' => 'is_image[profil]|max_size[profil,3062]'
        ])){
            
            $profil = $this->request->getFile('profil');
            if( $profil->getError() == 4 ){
                $namaProfil = $this->request->getPost('oldProfile');
            } else{
                if($this->request->getPost('oldProfile') != 'no-profil.png'){
                    unlink('profile/'.$this->request->getPost('oldProfile'));
                }
                $namaProfil = $profil->getRandomName();
                $profil->move('profile', $namaProfil);
            }

            $this->model->save([
                'id' => $id,
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_telp' => $this->request->getPost('no_telp'),
                'profil' => $namaProfil
                // 'profil' => $namaProfil
            ]);

            session()->setFlashData('success', 'Data User berhasil diubah');
            return redirect()->to('/staff');
        }
        else{
            return redirect()->back()->withInput();
        }


    }


}
