<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BukuModel;

class Buku extends BaseController
{
       // Variabel global
       // Agar model bisa ke-load untuk semua function di Controllers Class Barang
       protected $mbuku;
       protected $table = "buku";

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

       function simpan()
       {
              // Mengambil nilai yg dilempar oleh view (name="...")
              $idBuku = $this->request->getPost("idBuku");
              $judulBuku = $this->request->getPost("judulBuku");
              $pengarang = $this->request->getPost("pengarang");
              $penerbit = $this->request->getPost("penerbit");
              $tahunTerbit = $this->request->getPost("tahunTerbit");

              // Buat array baru untuk menampung data variabel
              $data = [
                     'id_bk' => $idBuku,
                     'judul_bk' => $judulBuku,
                     'pengarang' => $pengarang,
                     'penerbit' => $penerbit,
                     'thn_terbit' => $tahunTerbit,
              ];


              // Tambahkan error handling try ... catch untuk mencegah error
              try {
                     // Buat variabel baru untuk melempar data ke model
                     // $simpan yg ada disini, masukkan ke nama modelnya (mbuku)
                     // kemudian kirimkan ke method modelnya (simpanData) 
                     // Yg kita kirim pertama adalah table. Biar method nya dinamis
                     $simpan = $this->mbuku->simpanData($this->table, $data);

                     // ketika nyimpan dan berhasil, muncul alert
                     // tambahkan redirect dengan javascript windows.location
                     if ($simpan) {
                            echo "<script>alert('Data Berhasil Disimpan!'); 
                            window.location='" . base_url('Buku') . "';</script>";
                     } else {
                            echo '<script>alert("Data Gagal Disimpan!); 
                            window.location(' . base_url('/Buku') . ');</script>';
                     }
              } catch (\Throwable $th) {
                     // Ketika id buku (sifatnya unique / primary key) ada yg duplikat,
                     // muncul peringatan data duplikat. Cara mengatasinya lewat try catch ini
                     echo '<script>alert("ID Barang Sudah Ada!); 
                            window.location(' . base_url('/Buku') . ');</script>';
              }
       }


       function edit()
       {
              // Mengambil nilai yg dilempar oleh view (name="...")
              $idBuku = $this->request->getPost("id_bk");
              $judulBuku = $this->request->getPost("judulBuku");
              $pengarang = $this->request->getPost("pengarang");
              $penerbit = $this->request->getPost("penerbit");
              $tahunTerbit = $this->request->getPost("tahunTerbit");

              // Buat array baru untuk menampung data variabel
              $data = [
                     'id_bk' => $idBuku,
                     'judul_bk' => $judulBuku,
                     'pengarang' => $pengarang,
                     'penerbit' => $penerbit,
                     'thn_terbit' => $tahunTerbit,
              ];

              // id_barang nailainya diambil dari apapun yg diinputkan oleh viewnya yaitu $idbuku
              $where = ['id_bk' => $idBuku];


              // Tambahkan error handling try ... catch untuk mencegah error
              try {

                     // Nanti buat method baru di modelnya yg bernama editData
                     // dan ditambahkan variabel baru yg bernama $where, karena edit itu by id
                     $edit = $this->mbuku->editData($this->table, $data, $where);

                     // ketika nyimpan dan berhasil, muncul alert
                     // tambahkan redirect dengan javascript windows.location
                     if ($edit) {
                            echo "<script>alert('Data Berhasil Diedit!'); 
                            window.location='" . base_url('Buku') . "';</script>";
                     } else {
                            echo '<script>alert("Data Gagal Diedit!); 
                            window.location(' . base_url('/Buku') . ');</script>';
                     }
              } catch (\Throwable $th) {
                     // Ketika id buku (sifatnya unique / primary key) ada yg duplikat,
                     // muncul peringatan data duplikat. Cara mengatasinya lewat try catch ini
                     echo '<script>alert("ID Barang Sudah Ada!); 
                            window.location(' . base_url('/Buku') . ');</script>';
              }
       }


       function hapus($idBuku)
       {
              // id_barang nailainya diambil dari apapun yg diinputkan oleh viewnya yaitu $idbuku
              $where = ['id_bk' => $idBuku];


              // Tambahkan error handling try ... catch untuk mencegah error
              try {

                     // Nanti buat method baru di modelnya yg bernama editData
                     // dan ditambahkan variabel baru yg bernama $where, karena edit itu by id
                     $hapus = $this->mbuku->hapusData($this->table, $where);

                     // ketika nyimpan dan berhasil, muncul alert
                     // tambahkan redirect dengan javascript windows.location
                     if ($hapus) {
                            echo "<script>alert('Data Berhasil Dihapus!'); 
                            window.location='" . base_url('Buku') . "';</script>";
                     } else {
                            echo '<script>alert("Data Gagal Dihapus!); 
                            window.location(' . base_url('/Buku') . ');</script>';
                     }
              } catch (\Throwable $th) {
                     // Ketika id buku (sifatnya unique / primary key) ada yg duplikat,
                     // muncul peringatan data duplikat. Cara mengatasinya lewat try catch ini
                     echo '<script>alert("ID Barang Sudah Ada!); 
                            window.location(' . base_url('/Buku') . ');</script>';
              }
       }
}
