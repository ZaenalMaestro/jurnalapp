<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarPenelitianModel extends Model
{
   protected $table      = 'daftar_penelitian';
   protected $primaryKey = 'id_penelitian';
   protected $returnType = 'object';
}