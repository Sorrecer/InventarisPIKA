<?php

namespace App\Controllers;
use App\Models\BarangKeluarModel;

class BarangKeluar extends BaseController
{
    public function index()
    {
        $BarangKeluarModel = new BarangKeluarModel();
        $data['barang_keluar'] = $BarangKeluarModel->orderBy('id_transaksi', 'tanggal_keluar', 'nama_barang', 'jumlah_barang', 'keterangan', 'nama_ruang')->findAll();
        return view('templates/barang-keluar', $data);
    }
}