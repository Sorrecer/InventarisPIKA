<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;

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
        AND M.id_ruang = R.id_ruang;";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();

        $data['barang_masuk'] = $hasil;
        return view('templates/barang-masuk', $data);
    }
}
