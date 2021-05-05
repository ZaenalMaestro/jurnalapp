<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PenelitianModel as Penelitian;
use App\Models\GambarModel as Gambar;

class Data extends BaseController
{
	public function __construct(){
		helper('text');
		$this->penelitian = new Penelitian();
		$this->gambar = new Gambar();
		$this->validation =  \Config\Services::validation();
	}

	// menampilkan halaman dashborad - data penelitian
	public function index()
	{
		$data = [
			'title' 					=> 'Lihat Data',
			'role' 					=> 'Admin',
			'active_link' 			=> 'lihat_data',
			'daftar_penelitian'	=> $this->penelitian->findAll()
		];

		return view('admin/penelitian/index', $data);
	}

	// menampilkan form tambah data penelitian baru
	public function create()
	{
		$data = [
			'title' 			=> 'Tambah Data Penelitian',
			'role' 			=> 'Admin',
			'active_link' 	=> 'lihat_data',
			'validation'	=> $this->validation
		];

		return view('admin/penelitian/create', $data);
	}

	// tambah data penelitian baru
	public function store()
	{
		// get request files dan post
		$files 				= $this->request->getFiles();
		$data_penelitian 	= $this->request->getPost();

		// generate uniq id penelitian
		$id_penelitian = "penelitian_" . random_string('numeric',8);

		// validasi input penelitian
		if(!$this->validation->run($data_penelitian, 'admin')){
			return redirect()->back()->withInput();
		}

		try {
			// insert data kedalam table penelitian
			$this->penelitian->insertData($data_penelitian, $files, $id_penelitian);

			// insert data ketable gambar dengan tipe "gambar" berdasarkan id_penelitian
			$this->gambar->insertGambar($files, $id_penelitian);

			// insert data ketable gambar dengan tipe "dokumentasi" berdasarkan id_penelitian
			$this->gambar->insertDokumentasi($files, $id_penelitian);

			session()->setFlashData('pesan', 'Penelitian berhasil ditambahkan !');
			return redirect()->to('/admin/data');
		} catch (\Exception $e) {
			session()->setFlashData('pesan_error', 'Penelitian gagal ditambahkan !');
			return redirect()->to('/admin/data');
		}
		
	}

	// menambhakan data penelitian baru
	public function edit()
	{
		$data = [
			'title' 			=> 'Ubah Data Penelitian',
			'role' 			=> 'Admin',
			'active_link' 	=> 'lihat_data'
		];

		return view('admin/penelitian/edit', $data);
	}
}
