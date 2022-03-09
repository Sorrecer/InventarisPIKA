<?php

namespace App\Controllers;
use App\Models\RuangModel;

class Ruang extends BaseController
{
    public function index()
    {
        // return view('templates/ruang');
        $RuangModel = new RuangModel();
        $data['ruang'] = $RuangModel->orderBy('id_ruang', 'nama_ruang')->findAll();
        return view('templates/ruang', $data);
    }
}