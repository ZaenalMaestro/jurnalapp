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
			'rules'  => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]|ext_in[gambar,png,jpg,gif,jpeg]',
			'errors' => [
				'uploaded'  => '{field} tidak boleh kosong.',
				'is_image'  => 'File yang diupload bukan gambar.',
				'max_size'  => '{field} maksimal 2048 Kb.',
				'ext_in'		=> 'Format file tidak didukung',
			]
		],
		'dokumentasi' => [
			'rules'  => 'uploaded[dokumentasi]|is_image[dokumentasi]|max_size[dokumentasi,2048]|ext_in[dokumentasi,png,jpg,gif,jpeg]',
			'errors' => [
				'uploaded' => '{field} tidak boleh kosong.',
				'is_image'  => 'File yang diupload bukan gambar.',
				'max_size' => '{field} maksimal 2048 Kb.',
				'ext_in' => 'Format file tidak didukung',
			]
		],
	];
	//--------------------------------------------------------------------
}
