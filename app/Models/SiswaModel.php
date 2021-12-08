<?php 

namespace App\Models;

use CodeIgniter\Model;
Class SiswaModel extends Model 
{
    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    protected $useTimestamps = true;
    protected $createdField = 'created_s';
    protected $updatedField = 'updated_s';
    protected $allowedFields = ['nama'];
}
