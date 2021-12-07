<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BukuModel;

class Buku extends BaseController
{
       // Variabel global
       // Agar model bisa ke-load untuk semua function di Controllers Class Barang
       protected $mbuku;

       // Construct = agar model terload pertama kali
       public function __construct()
       {
              $this->mbuku = new BukuModel();
       }

       public function index()
       {
              $getdata = $this->mbuku->getdata();
              $data = array(
                     'dataBuku' => $getdata,
              );

              // Load view nya dan lempar array
              return view('v_buku', $data);
       }
}
