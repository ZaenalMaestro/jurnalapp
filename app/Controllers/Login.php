<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
	public function __construct()
	{
		$this->validation =  \Config\Services::validation();
		$this->user =  new UserModel();
	}

	public function index()
	{
		return view('login');
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
}
