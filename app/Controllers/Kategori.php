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

    public function delete($id_kategori = null){
        $KategoriModel = new KategoriModel();
        $data['kategori'] = $KategoriModel->where('id_kategori', $id_kategori)->delete($id_kategori);
        return $this->response->redirect(site_url('/kategori'));
    }
}