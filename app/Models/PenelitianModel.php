<?php

namespace App\Models;

use CodeIgniter\Model;

class PenelitianModel extends Model
{
   protected $table      = 'daftar_penelitian';
   protected $primaryKey = 'id_penelitian';
   protected $returnType = 'object';
   protected $allowedFields = [
      'id_penelitian', 
      'judul', 
      'nama_peneliti', 
      'deskripsi', 
      'waktu', 
      'tempat_palaksanaan', 
      'jurnal'
   ];

   public function __construct()
   {
      parent::__construct();
      $this->db      = \Config\Database::connect();
      $this->builder = $this->db->table('penelitian');
   }

   // menampilkan view daftar penelitian dari table penelitian dan gambar
   public function getData()
   {
      return $this->db->query('SELECT * FROM daftar_penelitian')
                        ->getResultObject();
   }

   // menampilkan view daftar penelitian dari table penelitian dan gambar
   public function getSingle($id_penelitian)
   {
      return $this->db->query("SELECT * FROM daftar_penelitian WHERE id_penelitian = '$id_penelitian'")
                        ->getResultObject()[0];
   }


   public function insertData($data_penelitian, $files, $id_penelitian)
   {
      // get nama jurnal
		$nama_jurnal = $files['jurnal']->getName();
      
		// upload jurnal
		$files['jurnal']->move(ROOTPATH . 'public/jurnal', $nama_jurnal);
		
		$record_penelitian = [
			'id_penelitian' 		=> $id_penelitian,
			'judul' 					=> $data_penelitian['judul'],
			'nama_peneliti'   	=> $data_penelitian['nama'],
			'deskripsi' 			=> $data_penelitian['deskripsi'],
			'waktu'    				=> $data_penelitian['tanggal'],
			'tempat_palaksanaan' => $data_penelitian['tempat'],
			'jurnal'    			=> $nama_jurnal
		];

      // insert data kedalam table penelitian
		$this->insert($record_penelitian);
   }
}