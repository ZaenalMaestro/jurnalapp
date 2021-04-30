<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Beranda extends BaseController
{
	public function index()
	{
		$data = [
			'title' 			=> 'Dashboard',
			'role' 			=> 'Admin',
			'active_link' 	=> 'beranda'
		];

		return view('beranda', $data);
	}
}
