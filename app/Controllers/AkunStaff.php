<?php

namespace App\Controllers;

use App\Models\StaffModel;

class AkunStaff extends BaseController
{
    public function index()
    {
        $StaffModel = new StaffModel();
        $data['staff'] = $StaffModel->orderBy('id_staff', 'username', 'email', 'telepon', 'password')->findAll();
        return view('templates/akun-staff', $data);
    }

    // tambah

    public function tambah()
    {
        return view('templates/tambah-akun-staff');
    }

    public function store()
    {
        $StaffModel = new StaffModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'password' => $this->request->getVar('password')
        ];

        $StaffModel->insert($data);
        return $this->response->redirect(base_url('/akunstaff'));
    }

    // edit

    public function edit($id_staff)
    {
        $StaffModel = new StaffModel();
        $data['staff'] = $StaffModel->where('id_staff', $id_staff)->first();
        return view('templates/edit-akun-staff', $data);
    }

    public function update()
    {
        $StaffModel = new StaffModel();
        $id = $this->request->getVar('id_staff');
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon')
        ];
        $StaffModel->update($id, $data);
        return $this->response->redirect(base_url('/akunstaff'));
    }

    public function delete($id_staff = null)
    {
        $StaffModel = new StaffModel();
        $data['staff'] = $StaffModel->where('id_staff', $id_staff)->delete($id_staff);
        return $this->response->redirect(base_url('/akunstaff'));
    }

    public function aktif()
    {
        $aktif = $this->request->getPost('aktif');
        $id = $this->request->getPost('id');
        $StaffModel = new StaffModel();
        // $StaffModel->builder()->update(
        //     ['aktif' => $aktif],
        //     "id_staff = $id"
        // );

        $db = \Config\Database::connect();
        $sql = "UPDATE staff SET aktif = $aktif
        WHERE id_staff = $id";
        $q = $db->query($sql);
        // $StaffModel->update(

        //     $this->request->getPost('id'),
        //     ['aktif' => strval($this->request->getPost('aktif'))]
        // );
        //     echo $sql;
    }
}
