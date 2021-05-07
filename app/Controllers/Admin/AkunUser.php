<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class AkunUser extends BaseController
{
	public function __construct(){
		$this->userModel = new UserModel();
	}

	public function index() 
	{
		$data = [
			'title' 			=> 'Akun User',
			'role' 			=> 'Admin',
			'active_link' 	=> 'akun_user',
			'users'	=> $this->userModel->findAll(),
		];

		return view('/admin/akun_user', $data);
	}

	// update status pengguna 
	public function update()
	{
		$id_user = $this->request->getPost('id_user');
		
		try {
			$this->userModel->update($id_user, ['status' => 'dikonfirmasi']);
			session()->setFlashData('pesan', 'Akun berhasil dikonfirmasi');
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashData('pesan_error', 'Akun gagal dikonfirmasi');
			return redirect()->back();
		}
	}

	
}
