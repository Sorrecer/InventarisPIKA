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
        $hasil = $BarangMasukModel->builder()->select('barang.nama_barang, kategori.nama_kategori,
        (sum(barang_masuk.jumlah_barang) - sum(barang_keluar.jumlah_barang)div count(barang_masuk.id_transaksi)) AS Jumlah, ruang.nama_ruang')
            ->join('barang_keluar', 'barang_masuk.id_barang = barang_keluar.id_barang')
            ->join('barang', 'barang_masuk.id_barang = barang.id_barang')
            ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
            ->join('ruang', 'barang_masuk.id_ruang = ruang.id_ruang')
            ->groupBy('barang.nama_barang, ruang.nama_ruang')
            ->get()->getResultArray();
        // dd($hasil);


        $data['barang'] = $hasil;
        return view('templates/data-barang', $data);
    }
}
