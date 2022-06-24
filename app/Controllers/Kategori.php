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

    //tambah

    public function tambah()
    {
        $data['validation'] = \Config\Services::validation();
        return view('templates/tambah-kategori', $data);
    }

    public function store()
    {
        // validasi input
        if (!$this->validate([
            'nama_kategori' => ['label' => 'nama kategori', 'rules' => 'required']
        ])) {
            // $validation = $this->validator;
            return view('templates/tambah-kategori', [
                'validation' => $this->validator
            ]);
        }

        $KategoriModel = new KategoriModel();
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ];

        $KategoriModel->insert($data);
        return $this->response->redirect(base_url('/kategori'));
    }

    // edit

    public function edit($id_kategori)
    {
        $KategoriModel = new KategoriModel();
        $data['validation'] = \Config\Services::validation();
        $data['kategori'] = $KategoriModel->where('id_kategori', $id_kategori)->first();
        $data['id_kategori'] = $id_kategori;
        return view('templates/edit-kategori', $data);
    }

    public function update($id_kategori)
    {
        // validasi input
        if (!$this->validate([
            'nama_kategori' => ['label' => 'nama kategori', 'rules' => 'required']
        ])) {
            // $validation = $this->validator;
            $KategoriModel = new KategoriModel();
            $data['validation'] = \Config\Services::validation();
            $data['kategori'] = $KategoriModel->where('id_kategori', $id_kategori)->first();
            $data['id_kategori'] = $id_kategori;
            return view('templates/edit-kategori', $data);
        }

        $KategoriModel = new KategoriModel();
        $id = $this->request->getVar('id_kategori');
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ];
        $KategoriModel->update($id, $data);
        return $this->response->redirect(base_url('/kategori'));
    }

    public function delete($id_kategori = null)
    {
        $KategoriModel = new KategoriModel();
        $data['kategori'] = $KategoriModel->where('id_kategori', $id_kategori)->delete($id_kategori);
        return $this->response->redirect(base_url('/kategori'));
    }
}
