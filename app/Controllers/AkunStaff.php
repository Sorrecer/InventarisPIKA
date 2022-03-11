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

    public function tambah()
    {
        return view('templates/tambah-akun-staff');
    }

    public function store(){
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

    public function edit()
    {
        return view('templates/edit-akun-staff');
    }

    public function delete($id_staff = null)
    {
        $StaffModel = new StaffModel();
        $data['staff'] = $StaffModel->where('id_staff', $id_staff)->delete($id_staff);
        return $this->response->redirect(base_url('/akunstaff'));
    }


}
