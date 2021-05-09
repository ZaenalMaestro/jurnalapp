<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	public $admin = [
		'judul' => [
			'rules'  => 'required|max_length[150]',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
				'max_length' => '{field} maksimal 150 karakter'
			]
		],
		'nama' => [
			'rules'  => 'required|max_length[50]',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
				'max_length' => '{field} maksimal 50 karakter'
			]
		],
		'tanggal' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'tempat' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'tempat' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'deskripsi' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'jurnal' => [
			'rules'  => 'uploaded[jurnal]|max_size[jurnal,2048]|ext_in[jurnal,pdf]',
			'errors' => [
				'uploaded'  => '{field} tidak boleh kosong.',
				'max_size'  => '{field} maksimal 2048 Kb.',
				'ext_in' 	=> '{field} harus berekstensi pdf',
			]
		],
		'gambar' => [
			'rules'  => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
			'errors' => [
				'uploaded'  => '{field} tidak boleh kosong.',
				'is_image'  => 'File yang diupload bukan gambar.',
				'max_size'  => '{field} maksimal 2048 Kb.',
			]
		],
		'dokumentasi' => [
			'rules'  => 'uploaded[dokumentasi]|is_image[dokumentasi]|max_size[dokumentasi,5048]',
			'errors' => [
				'uploaded' => '{field} tidak boleh kosong.',
				'is_image'  => 'File yang diupload bukan gambar.',
				'max_size' => '{field} maksimal 5048 Kb.',
			]
		],
	];

	public $registrasi = [
		'nama' => [
			'rules'  => 'required|max_length[50]|min_length[2]',
			'errors' => [
				'required'	 => 'Nama tidak boleh kosong.',
				'max_length' => 'Nama maksimal 50 karakter',
				'min_length' => 'Nama maksimal 2 karakter',
			]
		],
		'nomor_induk' => [
			'rules'  => 'required|integer|max_length[20]|min_length[11]',
			'errors' => [
				'required'	 => 'Nomor induk tidak boleh kosong.',
				'integer'	 => 'Nomor induk harus angka numeric.',
				'max_length' => 'Nomor induk maksimal 20 karakter',
				'min_length' => 'Nomor induk maksimal 11 karakter',
			]
		],
		'password' => [
			'rules'  => 'required|max_length[50]|min_length[8]',
			'errors' => [
				'required'	 => 'Password tidak boleh kosong.',
				'max_length' => 'Password maksimal 50 karakter',
				'min_length' => 'Password maksimal 8 karakter',
			]
		],
		'konfirmasi_password' => [
			'rules'  => 'required',
			'errors' => [
				'required'	 => 'konfirmasi password tidak boleh kosong.'
			]
		]
	];

	public $login = [
		'nomor_induk' => [
			'rules'  => 'required|max_length[20]|min_length[11]',
			'errors' => [
				'required'	 => 'Nomor induk tidak boleh kosong.',
				'max_length' => 'Nomor induk maksimal 20 karakter',
				'min_length' => 'Nomor induk minimal 11 karakter',
			]
		],
		'password' => [
			'rules'  => 'required|max_length[50]|min_length[8]',
			'errors' => [
				'required'	 => 'Password tidak boleh kosong.',
				'max_length' => 'Password maksimal 50 karakter',
				'min_length' => 'Password maksimal 8 karakter',
			]
		]
	];

	public $validasi_gambar = [
		'gambar' => [
			'rules'  => 'is_image[gambar]|max_size[gambar,2048]',
			'errors' => [
				'is_image'  => 'File yang diupload bukan gambar.',
				'max_size'  => '{field} maksimal 2048 Kb.',
			]
		]
	];
	public $validasi_dokumentasi = [
		'dokumentasi' => [
			'rules'  => 'is_image[dokumentasi]|max_size[dokumentasi,4048]',
			'errors' => [
				'is_image'  => 'File yang diupload bukan gambar.',
				'max_size'  => '{field} maksimal 4048 Kb.',
			]
		]
	];

	public $validasi_penelitian = [
		'judul' => [
			'rules'  => 'required|max_length[150]',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
				'max_length' => '{field} maksimal 150 karakter'
			]
		],
		'nama' => [
			'rules'  => 'required|max_length[50]',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
				'max_length' => '{field} maksimal 50 karakter'
			]
		],
		'tanggal' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'tempat' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'tempat' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'deskripsi' => [
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong.',
			]
		],
		'jurnal' => [
			'rules'  => 'max_size[jurnal,2048]|ext_in[jurnal,pdf]',
			'errors' => [
				'max_size'  => '{field} maksimal 2048 Kb.',
				'ext_in' 	=> '{field} harus berekstensi pdf',
			]
		]
	];
	//--------------------------------------------------------------------
}
