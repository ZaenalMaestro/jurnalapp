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
      $db      = \Config\Database::connect();
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
      $nama_gambar = $files['gambar']->getName();
		$files['gambar']->move(ROOTPATH . 'public/img/gambar', $nama_gambar);

		// insert nama gambar kedalam database
		$record_gambar = [
			'id_penelitian' 	=> $id_penelitian,
			'nama_gambar' 		=> $nama_gambar,
			'tipe' 				=> 'gambar',
		];      
      $this->builder->insert($gambar); 
   }

   // insert multiple nama dokumentasi dengan tipe dokumentasi
   public function insertDokumentasi($files, $id_penelitian)
   {      
      foreach ($files['dokumentasi'] as $dokumentasi) {
			$gambar_dokumentasi = $dokumentasi->getName();
			$dokumentasi->move(ROOTPATH . 'public/img/dokumentasi', $dokumentasi->getName());
			$record_dokumentasi [] = [
				'id_penelitian' 	=> $id_penelitian,
				'nama_gambar' 		=> $gambar_dokumentasi,
				'tipe' 				=> 'dokumentasi',
			];
		}

      $this->builder->insertBatch($record_dokumentasi); 
   }
}