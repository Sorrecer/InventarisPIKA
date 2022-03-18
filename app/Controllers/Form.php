<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Form extends Controller
{
    public function index()
    {
        helper(['form', 'url']);

        if (!$this->validate([
            'username' => ['label' => 'username', 'rules' => 'required'],
            'password' => ['label' => 'password', 'rules' => 'required|min_length[10]'],
            'passconf' => ['label' => 'konfirmasi password', 'rules' => 'matches[password]'],
            'email'    => 'required|valid_email',
        ])) {
            echo view('Signup', [
                'validation' => $this->validator,
            ]);
        } else {
            echo view('Success');
        }
    }
}
