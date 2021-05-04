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
	}

	// menampilkan halaman dashborad - data penelitian
	public function index()
	{
		$data = [
			'title' 					=> 'Lihat Data',
			'role' 					=> 'Admin',
			'active_link' 			=> 'lihat_data',
			'daftar_penelitian'	=> $this->penelitian->getData()
		];

		return view('admin/penelitian/index', $data);
	}

	// menampilkan form tambah data penelitian baru
	public function create()
	{
		$data = [
			'title' 			=> 'Tambah Data Penelitian',
			'role' 			=> 'Admin',
			'active_link' 	=> 'lihat_data'
		];

		return view('admin/penelitian/create', $data);
	}

	// tambah data penelitian baru
	public function store()
	{
		// generate uniq id penelitian
		$id_penelitian = "penelitian_" . random_string('numeric',8);
		
		// get request files dan post
		$data_penelitian 	= $this->request->getPost();
		$files 				= $this->request->getFiles();


		// insert data kedalam table penelitian
		$this->penelitian->insertData($data_penelitian, $files, $id_penelitian);

		// insert data ketable gambar dengan tipe "gambar" berdasarkan id_penelitian
		// $this->gambar->insertGambar($files, $id_penelitian);

		// insert data ketable gambar dengan tipe "dokumentasi" berdasarkan id_penelitian
		// $this->gambar->insertDokumentasi($files, $id_penelitian);
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
