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
			'active_link' 	=> 'lihat_data'
		];

		return view('admin/penelitian/create', $data);
	}

	// tambah data penelitian baru
	public function store()
	{
		// get request post
		$data_penelitian = $this->request->getPost();
		// get all files (jurnal, gambar, dan dokumentasi)
		$files = $this->request->getFiles();

		// ============== UPLOAD FILE JURNAL DAN INSERT DATA PENELITIAN ============== //
		// get nama jurnal
		$nama_jurnal = $files['jurnal']->getName();
		// upload jurnal
		$files['jurnal']->move(ROOTPATH . 'public/jurnal', $nama_jurnal);

		// generate uniq id penelitian
		$id_penelitian = "penelitian_" . random_string('numeric',8);
		// insert data kedalam table penelitian
		$record_penelitian = [
			'id_penelitian' 		=> $id_penelitian,
			'judul' 					=> $data_penelitian['judul'],
			'nama_peneliti'   	=> $data_penelitian['nama'],
			'deskripsi' 			=> $data_penelitian['deskripsi'],
			'waktu'    				=> $data_penelitian['tanggal'],
			'tempat_palaksanaan' => $data_penelitian['tempat'],
			'jurnal'    			=> $nama_jurnal
		];
		$this->penelitian->insert($record_penelitian);
		// ============== END UPLOAD FILE JURNAL DAN INSERT DATA PENELITIAN ============== //

		// ============== UPLOAD FILE GAMBAR DAN INSERT DATA GAMBAR (TABLE DOKUMENTASI) ============== //
		$nama_gambar = $files['gambar']->getName();
		$files['gambar']->move(ROOTPATH . 'public/img/gambar', $nama_gambar);

		// insert nama gambar kedalam database
		$record_gambar = [
			'id_penelitian' 	=> $id_penelitian,
			'nama_gambar' 		=> $nama_gambar,
			'tipe' 				=> 'gambar',
		];
		$this->gambar->insertGambar($record_gambar);
		// ============== END UPLOAD FILE GAMBAR DAN INSERT DATA GAMBAR (TABLE DOKUMENTASI) ============== //

		// ============== UPLOAD FILE DOKUMENTASI DAN INSERT DATA DOKUMENTASI (TABLE DOKUMENTASI) ============== //
		foreach ($files['dokumentasi'] as $dokumentasi) {
			$gambar_dokumentasi = $dokumentasi->getName();
			$dokumentasi->move(ROOTPATH . 'public/img/dokumentasi', $dokumentasi->getName());
			$record_dokumentasi [] = [
				'id_penelitian' 	=> $id_penelitian,
				'nama_gambar' 		=> $gambar_dokumentasi,
				'tipe' 				=> 'dokumentasi',
			];
		}
		$this->gambar->insertDokumentasi($record_dokumentasi);

		// insert nama gambar kedalam database
		
		// ============== END UPLOAD FILE DOKUMENTASI DAN INSERT DATA DOKUMENTASI (TABLE DOKUMENTASI) ============== //
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
