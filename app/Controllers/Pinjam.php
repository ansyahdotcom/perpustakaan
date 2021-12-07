<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Pinjam extends BaseController
{
    protected $LoginModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
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
            echo view('pinjam/v_addpinjam');
        }
    }
}
