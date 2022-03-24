<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class BuatAkun extends BaseController
{
    public function index()
    {
        return view('templates/buat-akun-staff');
    }

    // tambah

    public function store()
    {
        $StaffModel = new ModelLogin();
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'password' => $this->request->getVar('password')

        ];

        $StaffModel->insert($data);
        return $this->response->redirect(base_url('/akunstaff'));
    }
}
