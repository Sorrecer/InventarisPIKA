<?php

namespace App\Controllers;

// use App\Models\StaffModel;
use App\Models\ModelLogin;

class AkunStaff extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT id_user, username, email, telepon, password, aktif
        FROM users
        WHERE username != 'admin'";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();

        $data['staff'] = $hasil;
        return view('templates/akun-staff', $data);

        // $StaffModel = new StaffModel();
        // $data['staff'] = $StaffModel->orderBy('id_staff', 'username', 'email', 'telepon', 'password')->findAll();
        // return view('templates/akun-staff', $data);
    }

    // tambah

    // public function tambah()
    // {
    //     $data['validation'] = \Config\Services::validation();
    //     return view('templates/tambah-akun-staff', $data);
    // }

    // public function store()
    // {
    //     // validasi input
    //     if (!$this->validate([
    //         'username' => ['label' => 'username', 'rules' => 'required'],
    //         'email' => ['label' => 'email', 'rules' => 'required'],
    //         'telepon' => ['label' => 'telepon', 'rules' => 'required'],
    //         'password' => ['label' => 'password', 'rules' => 'required']
    //     ])) {
    //         // $validation = $this->validator;
    //         return view('templates/tambah-kategori', [
    //             'validation' => $this->validator
    //         ]);
    //     }

    //     $StaffModel = new ModelLogin();
    //     $data = [
    //         'username' => $this->request->getVar('username'),
    //         'email' => $this->request->getVar('email'),
    //         'telepon' => $this->request->getVar('telepon'),
    //         'password' => $this->request->getVar('password')
    //     ];

    //     $StaffModel->insert($data);
    //     return $this->response->redirect(base_url('/akunstaff'));
    // }

    // edit

    public function edit($id_user)
    {
        $StaffModel = new ModelLogin();
        $data['staff'] = $StaffModel->where('id_user', $id_user)->first();
        return view('templates/edit-akun-staff', $data);
    }

    public function update()
    {
        $StaffModel = new ModelLogin();
        $id = $this->request->getVar('id_user');
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon')
        ];
        $StaffModel->update($id, $data);
        return $this->response->redirect(base_url('/akunstaff'));
    }

    public function delete($id_user = null)
    {
        $StaffModel = new ModelLogin();
        $data['staff'] = $StaffModel->where('id_user', $id_user)->delete($id_user);
        return $this->response->redirect(base_url('/akunstaff'));
    }

    public function aktif()
    {
        $aktif = $this->request->getPost('aktif');
        $id = $this->request->getPost('id');
        $StaffModel = new ModelLogin();
        // $StaffModel->builder()->update(
        //     ['aktif' => $aktif],
        //     "id_staff = $id"
        // );

        $db = \Config\Database::connect();
        $sql = "UPDATE users SET aktif = $aktif
        WHERE id_user = $id";
        $q = $db->query($sql);
        // $StaffModel->update(

        //     $this->request->getPost('id'),
        //     ['aktif' => strval($this->request->getPost('aktif'))]
        // );
        //     echo $sql;
    }
}
