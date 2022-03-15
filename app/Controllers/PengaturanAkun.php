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

    // edit

    public function edit($id_admin)
    {
        $AkunModel = new AkunModel();
        $data['admin'] = $AkunModel->where('id_admin', $id_admin)->first();
        return view('templates/edit-akun', $data);
    }

    public function update()
    {
        $AkunModel = new AkunModel();
        $id = $this->request->getVar('id_admin');
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon')
        ];
        $AkunModel->update($id, $data);
        return $this->response->redirect(base_url('/pengaturanakun'));
    }
}
