<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\RuangModel;

class BarangKeluar extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT K.id_transaksi, K.tanggal_keluar, B.nama_barang,
        K.jumlah_barang, K.keterangan, R.nama_ruang
        FROM barang_keluar K
        JOIN barang B, ruang R
        WHERE K.id_barang = B.id_barang
        AND K.id_ruang = R.id_ruang;";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();

        $data['barang_keluar'] = $hasil;
        return view('templates/barang-keluar', $data);
    }

    //tambah

    public function tambah()
    {
        $BarangModel = new BarangModel();
        $RuangModel = new RuangModel();
        $data['barang'] = $BarangModel->orderBy('id_barang', 'nama_barang')->findAll();
        $data['ruang'] = $RuangModel->orderBy('id_ruang', 'nama_ruang')->findAll();
        return view('templates/tambah-barang-keluar', $data);
    }

    public function store()
    {
        $BarangKeluarModel = new BarangKeluarModel();
        $data = [
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'id_barang' => $this->request->getVar('id_barang'),
            'jumlah_barang' => $this->request->getVar('jumlah_barang'),
            'keterangan' => $this->request->getVar('keterangan'),
            'id_ruang' => $this->request->getVar('id_ruang')
        ];

        $BarangKeluarModel->insert($data);
        return $this->response->redirect(base_url('/BarangKeluar'));
    }

    public function delete($id_transaksi = null)
    {
        $BarangKeluarModel = new BarangKeluarModel();
        $data['barang_keluar'] = $BarangKeluarModel->where('id_transaksi', $id_transaksi)->delete($id_transaksi);
        return $this->response->redirect(base_url('/BarangKeluar'));
    }
}
