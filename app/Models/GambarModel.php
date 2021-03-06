<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
   protected $table      = 'gambar';
   protected $primaryKey = 'id_gambar';
   protected $returnType = 'object';
   protected $allowedFields = [
      'id_penelitian', 
      'nama_gambar', 
      'tipe'
   ];
   
   public function __construct()
   {
      parent::__construct();
      $db            = \Config\Database::connect();
      $this->builder = $db->table($this->table);
   }

   // menampilkan gambar dengan tipe dokumentasi
   public function dokumentasi($id_penelitian)
   {
      $array = ['id_penelitian' => $id_penelitian, 'tipe' => 'dokumentasi'];
      return $this->builder->where($array)->get()->getResultObject();
   }

   // insert gambar dengan tipe gambar
   public function insertGambar($files, $id_penelitian)
   {
      $nama_gambar = $files['gambar']->getRandomName();
		$files['gambar']->move(ROOTPATH . 'public/img/gambar', $nama_gambar);

		// insert nama gambar kedalam database
		$record_gambar = [
			'id_penelitian' 	=> $id_penelitian,
			'nama_gambar' 		=> $nama_gambar,
			'tipe' 				=> 'gambar',
		];      
      $this->builder->insert($record_gambar); 
   }

   public function updateGambar($file, $id_penelitian)
   {
      $filename = $file->getRandomName();
      $file->move(ROOTPATH . 'public/img/gambar', $filename);

      $data = [
         'nama_gambar' => $filename,
      ];

      // update gambar
      $this->builder->update($data, [
         'id_penelitian' => $id_penelitian,
         'tipe' => 'gambar',
      ]);
   }

   // insert multiple nama dokumentasi dengan tipe dokumentasi
   public function insertDokumentasi($files, $id_penelitian)
   {
      foreach ($files['dokumentasi'] as $dokumentasi) {
			$gambar_dokumentasi = $dokumentasi->getRandomName();
			$dokumentasi->move(ROOTPATH . 'public/img/dokumentasi', $gambar_dokumentasi);
			$record_dokumentasi [] = [
				'id_penelitian' 	=> $id_penelitian,
				'nama_gambar' 		=> $gambar_dokumentasi,
				'tipe' 				=> 'dokumentasi',
			];
		}

      $this->builder->insertBatch($record_dokumentasi); 
   }
}