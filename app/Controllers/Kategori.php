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

    public function tambah()
    {
        return view('templates/tambah-kategori');
    }

    public function store()
    {
        $KategoriModel = new KategoriModel();
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ];

        $KategoriModel->insert($data);
        return $this->response->redirect(base_url('/kategori'));
    }

    public function delete($id_kategori = null)
    {
        $KategoriModel = new KategoriModel();
        $data['kategori'] = $KategoriModel->where('id_kategori', $id_kategori)->delete($id_kategori);
        return $this->response->redirect(base_url('/kategori'));
    }
}
