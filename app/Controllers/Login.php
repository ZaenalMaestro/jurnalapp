<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;

class Login extends BaseController
{
	public function __construct()
	{
		$this->validation =  \Config\Services::validation();
		$this->user 		=  new UserModel();
		$this->admin 		=  new AdminModel();
	}

	public function index()
	{
		$data = [
			'validation' => $this->validation
		];

		return view('login', $data);
	}

	public function registrasi()
	{
		$data = [
			'validation' => $this->validation
		];

		return view('registrasi', $data);
	}

	public function signUp()
	{
		$registrasi = $this->request->getPost();

		// validasi nomor induk
		$nomor_induk_terdaftar = $this->user->where('nomor_induk', $registrasi['nomor_induk'])->first();
		if($nomor_induk_terdaftar){
			$this->validation->setError('nomor_induk', 'Nomor induk telah terdaftar');
			return redirect()->back()->withInput();
		}

		// validasi inputan
		if(!$this->validation->run($registrasi, 'registrasi')) {
			return redirect()->back()->withInput();
		}

		// insert data registrasi
		$data = [
			'nomor_induk' => $registrasi['nomor_induk'],
			'nama' 		  => $registrasi['nama'],
			'password' 	  => password_hash($registrasi['password'], PASSWORD_BCRYPT),
			'status'      => 'menunggu'
		];
		
		$this->user->insert($data);

		session()->setFlashData('pesan', 'Registrasi berhasil, silahkan tunggu konfirmasi admin');
		return redirect()->to('/');		
	}

	public function signIn()
	{
		// validasi inputan
		$login = $this->request->getPost();
		if(!$this->validation->run($login, 'login')) {
			return redirect()->back()->withInput();
		}

		$nomor_induk = $login['nomor_induk'];
		$data_admin = $this->admin->where('username', $nomor_induk)->first();
		$data_user  = $this->user->where('nomor_induk', $nomor_induk)->first();

		// jika yang login adalah admin
		if($data_admin) {
			if (password_verify($login['password'], $data_admin['password'])) {
				$data = [
					'login' => true,
					'role' => 'admin',
					'id_admin' => $data_admin['id_admin']
				];

				session()->set($data);
				return redirect()->to('/admin');
			} else {
				$this->validation->setError('password', 'Password tidak valid');
				return redirect()->back()->withInput();
			}
		} 
		
		if($data_user) {			
			if ($data_user->status == 'dikonfirmasi') { // jika akun telah dikonfirmasi				
				if (password_verify($login['password'], $data_user->password)) { // jika password benar
					$data = [
						'login' => true,
						'role' => 'user',
						'id_user' => $data_user->id_user,
						'nama' => $data_user->nama,
					];
	
					session()->set($data);
					return redirect()->to('/user');
				} else { // jika password salah
					$this->validation->setError('password', 'Password tidak valid');
					return redirect()->back()->withInput();
				}
			} else { // jika akun belum dikonfirmasi
				session()->setFlashData('pesan', 'Akun anda belum dikonfirmasi oleh admin');
				return redirect()->back()->withInput();
			}			
		}else{
			$this->validation->setError('nomor_induk', 'username atau password tidak valid');
			$this->validation->setError('password', 'username atau password tidak valid');
			return redirect()->back()->withInput();
		}
	}

	public function logOut()
	{
		session()->destroy();
		return redirect()->to('/');
	}
}
