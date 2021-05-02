<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Data extends BaseController
{
	// menampilkan halaman dashborad - data penelitian
	public function index()
	{
		$data = [
			'title' 			=> 'Lihat Data',
			'role' 			=> 'Admin',
			'active_link' 	=> 'lihat_data'
		];

		return view('admin/penelitian/index', $data);
	}

	// menambhakan data penelitian baru
	public function create()
	{
		$data = [
			'title' 			=> 'Tambah Data Penelitian',
			'role' 			=> 'Admin',
			'active_link' 	=> 'lihat_data'
		];

		return view('admin/penelitian/create', $data);
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
