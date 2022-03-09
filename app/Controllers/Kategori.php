<?php

namespace App\Controllers;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $KategoriModel = new KategoriModel();
        $data['kategori'] = $KategoriModel->orderBy('id_kategori', 'nama_kategori')->findAll();
        return view('templates/kategori', $data);
    }
}