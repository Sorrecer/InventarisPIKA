<?php

namespace App\Controllers;
use App\Models\BarangMasukModel;

class BarangMasuk extends BaseController
{
    public function index()
    {
        $BarangMasukModel = new BarangMasukModel();
        $data['barang_masuk'] = $BarangMasukModel->orderBy('id_transaksi', 'tanggal_masuk', 'nama_barang', 'jumlah_barang', 'jumlah_harga', 'nama_ruang')->findAll();
        return view('templates/barang-masuk', $data);
    }
}