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

    //validasi login
    public function cekUser()
    {
        $validation = \Config\Services::validation();
        //menerima username dan password
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        // dd($username);

        //validasi jika input kosong
        if (!$this->validate(
            [
                'username' => ['label' => 'username', 'rules' => 'required'],
                'password' => ['label' => 'passwor  d', 'rules' => 'required']
            ]
        )) {
            $sessError = [
                'errIdUser' => $validation->getError('username'),
                'errPassword' => $validation->getError('password')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(base_url('login/index'));

            //jika tidak kosong, validasi username apakah ada di database
        } else {
            $modelLogin = new ModelLogin();

            //mengambil id user dari username yang diinputkan
            $id_user = $modelLogin->builder()->select('id_user')->where('username', $username)
                ->get()->getFirstRow('array');

            //jika tidak ditemukan id user
            if ($id_user == null) {
                $sessError = [
                    'errIdUser' => 'Maaf, user tidak ditemukan'
                ];
                session()->setFlashdata($sessError);
                return redirect()->to(base_url('login/index'));

                //user ditemukan, cek password
            } else {
                $cekUserLogin = $modelLogin->find($id_user);
                $passCheck = $cekUserLogin[0]['password']; //<----- passwordnya user tergantung username
                if (password_verify($password, $passCheck)) {
                    //jika password benar, simpan sesi dan masuk home
                    $id_level = $cekUserLogin[0]['id_level'];
                    $simpan_session = [
                        'id_user' => $id_user,
                        'username' => $cekUserLogin[0]['username'],
                        'email' => $cekUserLogin[0]['email'],
                        'telepon' => $cekUserLogin[0]['telepon'],
                        'id_level' => $id_level,
                        'aktif' => $cekUserLogin[0]['aktif']
                    ];
                    session()->set($simpan_session);

                    if (session()->aktif == '0') {
                        $sessError = [
                            'errIdUser' => 'Silahkan hubungi admin untuk mengaktifkan akun anda'
                        ];
                        session()->setFlashdata($sessError);
                        return redirect()->to(base_url('login/index'));
                    } else {
                        return $this->response->redirect(base_url('Home'));
                    }

                    //jika password salah
                } else {
                    $sessError = [
                        'errPassword' => 'Maaf, password anda salah'
                    ];
                    session()->setFlashdata($sessError);
                    return redirect()->to(base_url('login/index'));
                }
            }
        }
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to(base_url('login/index'));
    }
}
