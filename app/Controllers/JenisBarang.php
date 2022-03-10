<?php

namespace App\Controllers;
use App\Models\BarangModel;

class JenisBarang extends BaseController
{
    public function index()
    {
        $BarangModel = new BarangModel();
        $data['barang'] = $BarangModel->orderBy('id_barang', 'nama_barang', 'nama_kategori')->findAll();
        return view('templates/jenis-barang', $data);
    }
}