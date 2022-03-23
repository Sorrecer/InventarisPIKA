<?php

namespace App\Controllers;

use App\Models\ModelLogin;


class Login extends BaseController
{
    public function index()
    {
        $data['validation'] = \Config\Services::validation();
        return view('templates/login', $data);
    }

    public function cekUser()
    {
        $validation = \Config\Services::validation();
        //menerima data login
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];


        //validasi kosong
        if (!$this->validate(
            [
                'username' => ['label' => 'username', 'rules' => 'required'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ]
        )) {
            $sessError = [
                'errIdUser' => $validation->getError('username'),
                'errPassword' => $validation->getError('password')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(base_url('login/index'));

            //validasi username
        } else {
            $ModelLogin = new ModelLogin();
            $cekUserLogin = $ModelLogin->find($data['username']);
            // dd($data['username']);
            if ($cekUserLogin == null) {
                $sessError = [
                    'errIdUser' => 'Maaf, user tidak ditemukan'
                ];
                session()->setFlashdata($sessError);
                return redirect()->to(base_url('login/index'));
            }
            return view('templates/index');
        }

        // return $this->response->redirect(base_url('Home'));
    }
}
