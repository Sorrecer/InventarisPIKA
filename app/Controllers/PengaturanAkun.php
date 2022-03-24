<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\ModelLogin;

class PengaturanAkun extends BaseController
{
    public function index()
    {
        $AkunModel = new ModelLogin();
        $data['admin'] = $AkunModel->orderBy('id_user', 'username', 'email', 'telepon', 'password')->findAll();
        return view('templates/pengaturan-akun', $data);
    }

    // edit

    public function edit($id_user)
    {
        $AkunModel = new ModelLogin();
        $data['admin'] = $AkunModel->where('id_user', $id_user)->first();
        return view('templates/edit-akun', $data);
    }

    public function update()
    {
        $AkunModel = new ModelLogin();
        $id = $this->request->getVar('id_user');
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon')
        ];
        $simpan_session = [
            'username' => $data['username'],
            'email' => $data['email'],
            'telepon' => $data['telepon']
        ];
        session()->set($simpan_session);
        // dd($id, $data['username'], $data['telepon']);
        $AkunModel->update($id, $data);
        return $this->response->redirect(base_url('/pengaturanakun'));
    }
}
