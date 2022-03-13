<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;

class Barang extends BaseController
{
    public function index()
    {
        $BarangMasukModel = new BarangMasukModel();
        $BarangMasukModel->builder();
        $hasil = $BarangMasukModel->builder()->select('barang_masuk.nama_barang, barang.nama_kategori,
        (barang_masuk.jumlah_barang - barang_keluar.jumlah_barang) AS Stok, barang_masuk.nama_ruang')
            ->join('barang_keluar', 'barang_masuk.nama_barang = barang_keluar.nama_barang')
            ->join('barang', 'barang.nama_barang = barang_masuk.nama_barang')
            ->get()->getResultArray();
        // dd($hasil);


        $data['barang'] = $hasil;
        return view('templates/data-barang', $data);
    }
}
