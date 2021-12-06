<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Dashboard extends BaseController
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
            $data = [
                'username' => $user['username']
            ];
            echo view('v_dashboard', $data);
        }
    }
}
