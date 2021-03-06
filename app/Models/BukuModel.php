<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
       protected $table = 'buku';
       protected $primaryKey = 'id_bk';
       protected $useTimestamps = true;
       protected $createdField = 'created_bk';
       protected $updatedField = 'updated_bk';
       protected $allowedFields = ['judul_bk', 'pengarang'];

       public function getdata()
       {
              $query = $this->db->query("SELECT * FROM buku ORDER BY judul_bk ASC");

              return $query->getResult();
       }

       // Buat method baru di model. Harus = method yg diketik di controller
       // Menerima $table dan $data
       function simpanData($table, $data)
       {
              // Script query untuk simpan data
              // Tabel namanya diambil dari apapun yg dilempar oleh controller
              $this->db->table($table)->insert($data);
              return true;
       }
       function editData($table, $data, $where)
       {
              // Script query untuk simpan data
              // Tabel namanya diambil dari apapun yg dilempar oleh controller

              // karena update itu by id, maka tambahin $where
              $this->db->table($table)->update($data, $where);
              return true;
       }
       function hapusData($table, $where)
       {
              // Script query untuk simpan data
              // Tabel namanya diambil dari apapun yg dilempar oleh controller

              // karena update itu by id, maka tambahin $where
              $this->db->table($table)->delete($where);
              return true;
       }
}
