<?php 

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_pi';
    protected $useTimestamps = true;
    protected $createdField = 'created_pi';
    protected $updatedField = 'updated_pi';
    protected $allowedFields = ['nis', 'tgl_wajib_kembali'];
}
?>