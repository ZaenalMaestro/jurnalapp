<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
   protected $table      = 'gambar';
   protected $primaryKey = 'id_gambar';
   protected $returnType = 'object';
   
   public function __construct()
   {
      $db      = \Config\Database::connect();
      $this->builder = $db->table($this->table);
   }

   public function dokumentasi($id_penelitian)
   {
      $array = ['id_penelitian' => $id_penelitian, 'tipe' => 'dokumentasi'];
      return $this->builder->where($array)->get()->getResultObject();
   }
}