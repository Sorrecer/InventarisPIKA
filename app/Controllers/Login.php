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
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];

        if (!$this->validate(
            [
                'username' => ['label' => 'username', 'rules' => 'required'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ]
        )) {
            $data['validation'] = $this->validator;
            return view('templates/login', $data);
        } else {
            $ModelLogin = new ModelLogin();
            $cekUserLogin = $ModelLogin->find('username');
            if ($cekUserLogin == null) {
                $data['validation'] = $this->validator;
                return view('templates/login', $data);
            }
            return view('templates/index');
        }

        // return $this->response->redirect(base_url('Home'));
    }
}
