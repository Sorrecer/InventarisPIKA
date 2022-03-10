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

    public function delete($id_staff = null)
    {
        $StaffModel = new StaffModel();
        $data['staff'] = $StaffModel->where('id_staff', $id_staff)->delete($id_staff);
        return $this->response->redirect(base_url('/akunstaff'));
    }
}
