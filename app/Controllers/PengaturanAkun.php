<?php

namespace App\Controllers;
use App\Models\AkunModel;

class PengaturanAkun extends BaseController
{
    public function index()
    {
        $AkunModel = new AkunModel();
        $data['admin'] = $AkunModel->orderBy('id_admin', 'username', 'email', 'telepon', 'password')->findAll();
        return view('templates/pengaturan-akun', $data);
    }
}