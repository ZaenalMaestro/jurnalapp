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
}