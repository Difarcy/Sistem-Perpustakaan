<?php namespace App\Controllers;

use App\Models\UsersModel;

class MyProfile extends BaseController
{
	public function __construct()
	{
		$this->model = new UsersModel();
	}

	public function index()
	{
		$data = [ 
					'user' => $this->model->getById(session()->get('id')),
				];

		return view('myprofile', $data);
	}

	public function edit($id)
	{
		if($this->request->getPost()){
			
			// tangkap data password
			$getPassword = $this->request->getPost('password');
			$getPasswordDatabase = $this->model->where('id', $id)->first();

			if(password_verify($getPassword, $getPasswordDatabase['password'])){
				$getNewPassword = $this->request->getPost('password_baru');
				$passwordBaru = password_hash($getNewPassword, PASSWORD_DEFAULT);

				$this->model->save([
					'id' => $id,
					'password' => $passwordBaru
				]);

				session()->setFlashData('success', "Password Berhasil Diubah");
				return redirect()->to('/dashboard');

			// jika password lama tidak sama
			} else {
				session()->setFlashData('gagal', "Password lama Tidak Sesuai!");
				return redirect()->back();
			}

		}

	}

	//--------------------------------------------------------------------

}
