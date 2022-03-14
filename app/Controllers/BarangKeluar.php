<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;

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
}
