<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Beranda extends BaseController
{
	// menampilkan halaman dashborad - data penelitian
	public function index()
	{
		$data = [
			'title' 			=> 'Data Penelitian',
			'role' 			=> 'Admin',
			'active_link' 	=> 'beranda'
		];

		return view('admin/beranda', $data);
	}

	// menampilkan detail data penelitian
	public function show()
	{
		$data = [
			'title' 			=> 'Detail Penelitian',
			'role' 			=> 'Admin',
			'active_link' 	=> 'beranda'
		];

		return view('admin/detail', $data);
	}
}
