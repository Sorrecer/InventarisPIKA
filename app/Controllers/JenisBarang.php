<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;

class JenisBarang extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT B.id_barang, B.nama_barang, IF(K.nama_kategori IS NULL, 'Tidak ada', K.nama_kategori) as nama_kategori,
        B.jumlah_minimal
        FROM barang B
        LEFT JOIN kategori K
        ON B.id_kategori = K.id_kategori;";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();

        $data['barang'] = $hasil;

        // kategori
        $KategoriModel = new KategoriModel();
        $data['kategori'] = $KategoriModel->orderBy('id_kategori', 'nama_kategori')->findAll();

        return view('templates/jenis-barang', $data);
    }

    public function tambah()
    {
        $KategoriModel = new KategoriModel();
        $data['validation'] = \Config\Services::validation();
        $data['kategori'] = $KategoriModel->orderBy('id_kategori', 'nama_kategori')->findAll();
        return view('templates/tambah-jenis-barang', $data);
    }
    // $data['kategori'] = $KategoriModel->builder()
    // ->join('barang', 'barang.id_kategori = kategori.id_kategori')
    // ->get()->getResultArray();

    public function store()
    {
        // validasi input
        if (!$this->validate(
            [
                'nama_barang' => ['label' => 'nama barang', 'rules' => 'required'],
                'id_kategori' => ['label' => 'nama kategori', 'rules' => 'required'],
                'jumlah_minimal' => ['label' => 'jumlah minimal', 'rules' => 'required']
            ]
        )) {
            // $validation = $this->validator;
            $KategoriModel = new KategoriModel();
            $data['kategori'] = $KategoriModel->orderBy('id_kategori', 'nama_kategori')->findAll();
            $data['validation'] = $this->validator;
            return view('templates/tambah-jenis-barang', $data);
        }

        $BarangModel = new BarangModel();
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'jumlah_minimal' => $this->request->getVar('jumlah_minimal')
        ];

        $BarangModel->insert($data);
        return $this->response->redirect(base_url('/jenisbarang'));
    }

    // edit

    public function edit($id_barang)
    {
        $BarangModel = new BarangModel();
        $KategoriModel = new KategoriModel();
        $data['validation'] = \Config\Services::validation();
        $data['id_barang'] = $id_barang;
        $data['barang'] = $BarangModel->find($id_barang);
        $data['kategori'] = $KategoriModel->orderBy('id_kategori', 'nama_kategori')->findAll();
        return view('templates/edit-barang', $data);
    }

    public function update($id_barang)
    {
        // validasi input
        if (!$this->validate([
            'nama_barang' => ['label' => 'nama barang', 'rules' => 'required'],
            'id_kategori' => ['label' => 'nama kategori', 'rules' => 'required'],
            'jumlah_minimal' => ['label' => 'jumlah minimal', 'rules' => 'required']
        ])) {
            // $validation = $this->validator;
            $BarangModel = new BarangModel();
            $KategoriModel = new KategoriModel();
            $data['validation'] = \Config\Services::validation();
            $data['kategori'] = $KategoriModel->orderBy('id_kategori', 'nama_kategori')->findAll();
            $data['barang'] = $BarangModel->find($id_barang);
            $data['id_barang'] = $id_barang;
            return view('templates/edit-barang', $data);
        }

        $BarangModel = new BarangModel();
        $id = $this->request->getVar('id_barang');
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'jumlah_minimal' => $this->request->getVar('jumlah_minimal')
        ];
        $BarangModel->update($id, $data);
        return $this->response->redirect(base_url('/JenisBarang'));
    }

    public function delete($id_barang = null)
    {
        $BarangModel = new BarangModel();
        $data['barang'] = $BarangModel->where('id_barang', $id_barang)->delete($id_barang);
        return $this->response->redirect(base_url('/JenisBarang'));
    }
}
