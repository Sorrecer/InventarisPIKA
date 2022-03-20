<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('templates/login');
    }

    public function validasi()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $valid = true;
        // validasi input
        if (!$this->validate([
            'username' => ['label' => 'username', 'rules' => 'required'],
            'password' => ['label' => 'password', 'rules' => 'required']
        ])) {
            // $validation = $this->validator;
            return view('templates/tambah-kategori', [
                'validation' => $this->validator
            ]);
        }

        return $this->response->redirect(base_url('templates/index'));
    }
}
