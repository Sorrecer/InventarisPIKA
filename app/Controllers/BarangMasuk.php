<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use App\Models\RuangModel;

class BarangMasuk extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT M.id_transaksi, M.tanggal_masuk, B.nama_barang,
        M.jumlah_barang, M.jumlah_harga, R.nama_ruang
        FROM barang_masuk M
        JOIN barang B, ruang R
        WHERE M.id_barang = B.id_barang
        AND M.id_ruang = R.id_ruang
        ORDER BY M.id_transaksi DESC;";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();

        $data['barang_masuk'] = $hasil;
        session()->setFlashdata('id_sidebar', '6');
        return view('templates/barang-masuk', $data);
    }

    //tambah

    public function tambah()
    {
        $BarangModel = new BarangModel();
        $RuangModel = new RuangModel();
        $data['validation'] = \Config\Services::validation();
        $data['barang'] = $BarangModel->orderBy('id_barang', 'nama_barang')->findAll();
        $data['ruang'] = $RuangModel->orderBy('id_ruang', 'nama_ruang')->findAll();
        return view('templates/tambah-barang-masuk', $data);
    }

    public function store()
    {
        // validasi input
        if (!$this->validate([
            'tanggal_masuk' => ['label' => 'tanggal masuk', 'rules' => 'required'],
            'id_barang' => ['label' => 'nama barang', 'rules' => 'required'],
            'jumlah_barang' => ['label' => 'jumlah barang', 'rules' => 'required'],
            'jumlah_harga' => ['label' => 'jumlah harga', 'rules' => 'required'],
            'id_ruang' => ['label' => 'nama ruang', 'rules' => 'required'],
        ])) {
            // $validation = $this->validator;
            $BarangModel = new BarangModel();
            $RuangModel = new RuangModel();
            $data['validation'] = $this->validator;
            $data['barang'] = $BarangModel->orderBy('id_barang', 'nama_barang')->findAll();
            $data['ruang'] = $RuangModel->orderBy('id_ruang', 'nama_ruang')->findAll();
            return view('templates/tambah-barang-masuk', $data);
        }

        $BarangMasukModel = new BarangMasukModel();
        $data = [
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'id_barang' => $this->request->getVar('id_barang'),
            'jumlah_barang' => $this->request->getVar('jumlah_barang'),
            'jumlah_harga' => $this->request->getVar('jumlah_harga'),
            'id_ruang' => $this->request->getVar('id_ruang')
        ];

        $BarangMasukModel->insert($data);
        session()->set('notif', $this->notif());
        return $this->response->redirect(base_url('/BarangMasuk'));
    }

    // edit

    public function edit($id_transaksi)
    {
        $BarangMasukModel = new BarangMasukModel();
        $BarangModel = new BarangModel();
        $RuangModel = new RuangModel();
        $data['barang_masuk'] = $BarangMasukModel->find($id_transaksi);
        $data['barang'] = $BarangModel->orderBy('id_barang', 'nama_barang', 'id_kategori')->findAll();
        $data['ruang'] = $RuangModel->orderBy('id_ruang', 'nama_ruang')->findAll();
        return view('templates/edit-barang-masuk', $data);
    }

    public function update()
    {
        $BarangMasukModel = new BarangMasukModel();
        $id = $this->request->getVar('id_transaksi');
        $data = [
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'id_barang' => $this->request->getVar('id_barang'),
            'jumlah_barang' => $this->request->getVar('jumlah_barang'),
            'jumlah_harga' => $this->request->getVar('jumlah_harga'),
            'id_ruang' => $this->request->getVar('id_ruang')
        ];
        $BarangMasukModel->update($id, $data);
        session()->set('notif', $this->notif());
        return $this->response->redirect(base_url('/BarangMasuk'));
    }


    public function delete($id_transaksi = null)
    {
        session()->setFlashdata('swal_icon', 'success');
        session()->setFlashdata('swal_title', 'Berhasil');
        session()->setFlashdata('swal_text', 'Data berhasil dihapus');
        $BarangMasukModel = new BarangMasukModel();
        $data['barang_masuk'] = $BarangMasukModel->where('id_transaksi', $id_transaksi)->delete($id_transaksi);
        session()->set('notif', $this->notif());
        return $this->response->redirect(base_url('/BarangMasuk'));
    }
}
