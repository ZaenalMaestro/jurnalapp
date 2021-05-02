<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

class Data extends BaseController
{
	// menampilkan halaman dashborad - data penelitian
	public function index()
	{
		$data = [
			'title' 			=> 'Lihat Data',
			'role' 			=> 'User',
			'active_link' 	=> 'lihat_data'
		];

		return view('user/penelitian/index', $data);
	}

	// menambhakan data penelitian baru
	public function create()
	{
		$data = [
			'title' 			=> 'Tambah Data Penelitian',
			'role' 			=> 'User',
			'active_link' 	=> 'lihat_data'
		];

		return view('user/penelitian/create', $data);
	}

	// menambhakan data penelitian baru
	public function edit()
	{
		$data = [
			'title' 			=> 'Ubah Data Penelitian',
			'role' 			=> 'User',
			'active_link' 	=> 'lihat_data'
		];

		return view('user/penelitian/edit', $data);
	}
}
