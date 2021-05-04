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

   // insert multiple nama gambar dengan tipe dokumentasi
   public function insertGambar($gambar)
   {      
      $this->builder->insert($gambar); 
   }

   // insert multiple nama gambar dengan tipe dokumentasi
   public function insertDokumentasi($dokumentasi)
   {      
      $this->builder->insertBatch($dokumentasi); 
   }
}