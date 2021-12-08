<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\SiswaModel;
use App\Models\BukuModel;
use DateInterval;

class Pinjam extends BaseController
{
    protected $LoginModel;
    protected $SiswaModel;
    protected $BukuModel;

    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->SiswaModel = new SiswaModel;
        $this->BukuModel = new BukuModel;
    }

    public function index()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            echo view('pinjam/v_pinjam');
        }
    }

    public function addpinjam()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'siswa' => $this->SiswaModel->findAll(),
                'buku' => $this->BukuModel->findAll()
            ];
            echo view('pinjam/v_addpinjam', $data);
        }
    }

    public function save()
    {
        $nis = $this->request->getVar('nis');
        $id_bk = $this->request->getVar('id_bk');
        $jml_pinjam = $this->request->getVar('jml_pinjam');
        $tgl_pinjam = $this->request->getVar('tgl_pinjam');
        $wjb_kembali = strtotime($tgl_pinjam) + (3600 * 24 * 7);
        $kembali = date('Y-m-d', $wjb_kembali);

        $data = [
            'nis' => $nis,
            'id_bk' => $id_bk,
            'jml_pinjam' => $jml_pinjam,
            'tgl_pinjam' => date('Y-m-d', strtotime($tgl_pinjam)),
            'tgl_wajib_kembali' => $kembali
        ];
        $stok = $this->BukuModel->select('stok')->where(['id_bk' => $id_bk])->first();
        if ($stok['stok'] < $jml_pinjam) {
            echo 'buku kurang';
        } else {
            $jumlah = $stok['stok'] - $jml_pinjam;
            echo $jumlah;
        }
    }
}
