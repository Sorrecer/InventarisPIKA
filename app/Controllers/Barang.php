<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;

class Barang extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT B.nama_barang,
        IF(kat.nama_kategori IS NULL, 'Tidak ada', kat.nama_kategori) as nama_kategori,
        IF(K.jum IS NULL, M.jum, M.jum-K.jum) AS Jumlah,
        R.nama_ruang

        FROM
        (SELECT id_barang, id_ruang, sum(jumlah_barang) AS jum
        FROM barang_masuk
        GROUP BY id_barang, id_ruang) M

        LEFT JOIN

        (SELECT id_barang, id_ruang, sum(jumlah_barang) AS jum
        FROM barang_keluar
        GROUP BY id_barang, id_ruang) K

        ON M.id_barang = K.id_barang
        AND M.id_ruang = K.id_ruang

        LEFT JOIN barang B
        ON M.id_barang = B.id_barang
        LEFT JOIN kategori kat
        ON B.id_kategori = kat.id_kategori
        LEFT JOIN ruang R
        ON M.id_ruang = R.id_ruang
        GROUP BY M.id_barang, M.id_ruang;
        ";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();

        $data['databarang'] = $hasil;
        return view('templates/data-barang', $data);
    }
}
