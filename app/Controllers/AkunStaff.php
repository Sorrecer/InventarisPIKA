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
}