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
        session()->setFlashdata('id_sidebar', '10');
        return view('templates/akun-staff', $data);
    }

    public function edit($id_user)
    {
        $StaffModel = new ModelLogin();
        $data['validation'] = \Config\Services::validation();
        $data['staff'] = $StaffModel->where('id_user', $id_user)->first();
        $data['id_user'] = $id_user;
        return view('templates/edit-akun-staff', $data);
    }

    public function update($id_user)
    {
        //validasi
        if (!$this->validate([
            'username' => ['label' => 'username', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required'],
            'telepon' => ['label' => 'telepon', 'rules' => 'required']
        ])) {
            $validation = $this->validator;
            $StaffModel = new ModelLogin();
            $data['validation'] = \Config\Services::validation();
            $data['staff'] = $StaffModel->where('id_user', $id_user)->first();
            $data['id_user'] = $id_user;
            return view('templates/edit-akun-staff', $data);
        }

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
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Data berhasil dihapus');
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
