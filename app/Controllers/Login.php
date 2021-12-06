<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    protected $LoginModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
    }

    public function index()
    {
        if (session()->get('username') != NULL) {
            return redirect()->to('/dashboard');
        } else {
            echo view('v_login');
        }
    }

    public function login()
    {
        // REGISTER
        // $this->LoginModel->save([
        //     'username' => $this->request->getVar('username'),
        //     'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        // ]);
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $login = $this->LoginModel->where(['username' => $username])->first();

        if ($login) {
            if (password_verify($password, $login['password'])) {
                $data = [
                    'username' => $login['username']
                ];
                session()->set($data);
                // session()->setFlashdata('message', 'login');
                return redirect()->to('/dashboard');
            } else {
                // session()->setFlashdata('message', 'wrong_passwd');
                return redirect()->to('/login');
            }
        } else {
            // session()->setFlashdata('message', 'belum_terdaftar');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy(TRUE);
        // session()->setFlashdata('message', 'logout');
        return redirect()->to('/login');
    }
}
