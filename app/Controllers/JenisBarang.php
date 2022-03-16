<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;

class JenisBarang extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT B.id_barang, B.nama_barang, IF(K.nama_kategori IS NULL, 'Tidak ada', K.nama_kategori) as nama_kategori
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
        $data['kategori'] = $KategoriModel->orderBy('id_kategori', 'nama_kategori')->findAll();
        return view('templates/tambah-jenis-barang', $data);
    }
    // $data['kategori'] = $KategoriModel->builder()
    // ->join('barang', 'barang.id_kategori = kategori.id_kategori')
    // ->get()->getResultArray();

    public function store()
    {
        // dd($_POST);
        $BarangModel = new BarangModel();
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori')
        ];

        $BarangModel->insert($data);
        return $this->response->redirect(base_url('/jenisbarang'));
    }

    public function delete($id_barang = null)
    {
        $BarangModel = new BarangModel();
        $data['barang'] = $BarangModel->where('id_barang', $id_barang)->delete($id_barang);
        return $this->response->redirect(base_url('/JenisBarang'));
    }
}
