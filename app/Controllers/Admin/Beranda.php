<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Beranda extends BaseController
{
	// menampilkan halaman dashborad - data penelitian
	public function index()
	{
		$data = [
			'title' 			=> 'Beranda',
			'role' 			=> 'Admin',
			'active_link' 	=> 'beranda'
		];

		return view('admin/beranda/index', $data);
	}

	// menampilkan detail data penelitian
	public function show()
	{
		$data = [
			'title' 			=> 'Detail',
			'role' 			=> 'Admin',
			'active_link' 	=> 'beranda'
		];

		return view('admin/beranda/show', $data);
	}
}
