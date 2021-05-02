<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

class Beranda extends BaseController
{
	// menampilkan halaman dashborad - data penelitian
	public function index()
	{
		$data = [
			'title' 			=> 'Beranda',
			'role' 			=> 'User',
			'active_link' 	=> 'beranda'
		];

		return view('user/beranda/index', $data);
	}

	// menampilkan detail data penelitian
	public function show()
	{
		$data = [
			'title' 			=> 'Detail',
			'role' 			=> 'User',
			'active_link' 	=> 'beranda'
		];

		return view('user/beranda/show', $data);
	}
}
