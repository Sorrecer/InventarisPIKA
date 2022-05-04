<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class BuatAkun extends BaseController
{
    public function index()
    {
        $data['validation'] = \Config\Services::validation();
        return view('templates/buat-akun-staff', $data);
    }

    // tambah

    public function store()
    {
        // validasi input
        if (!$this->validate([
            'username' => ['label' => 'username', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
            'telepon' => ['label' => 'telepon', 'rules' => 'required'],
            'password' => ['label' => 'password', 'rules' => 'required'],
            'konfpassword' => ['label' => 'konfirmasi password', 'rules' => 'required|matches[password]'],
        ])) {
            // $validation = $this->validator;
            return view('templates/buat-akun-staff', [
                'validation' => $this->validator
            ]);
        }


        $StaffModel = new ModelLogin();
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)

        ];

        $StaffModel->insert($data);
        return $this->response->redirect(base_url('/login'));
    }
}
