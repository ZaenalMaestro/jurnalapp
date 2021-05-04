<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\PenelitianModel as Penelitian;
use App\Models\GambarModel as Gambar;

class Beranda extends BaseController
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
			'title' 					=> 'Beranda',
			'role' 					=> 'Admin',
			'active_link' 			=> 'beranda',
			'daftar_penelitian'	=> $this->penelitian->findAll()
		];

		return view('admin/beranda/index', $data);
	}

	// menampilkan detail data penelitian
	public function show($penelitian_id)
	{
		// get data penelitian
		$penelitian 	= $this->penelitian->find($penelitian_id);
		// get gambar dokumentasi penelitian
		$dokumentasi 	= $this->gambar->dokumentasi($penelitian_id);
		$data = [
			'title' 			=> 'Detail',
			'role' 			=> 'Admin',
			'active_link' 	=> 'beranda',
			'penelitian'	=> $penelitian,
			'dokumentasi'	=> $dokumentasi
		];

		// dd($data);

		return view('admin/beranda/show', $data);
	}
}
