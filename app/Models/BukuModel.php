<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
       public function getdata()
       {
              $query = $this->db->query("SELECT * FROM buku ORDER BY judul_bk");

              return $query->getResult();
       }
}
