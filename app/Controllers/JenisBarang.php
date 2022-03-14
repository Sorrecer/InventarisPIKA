<?php

namespace App\Controllers;

use App\Models\BarangModel;

class JenisBarang extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT B.id_barang, B.nama_barang, K.nama_kategori
        FROM barang B
        JOIN kategori K
        WHERE B.id_kategori = K.id_kategori;";
        $q = $db->query($sql);
        $hasil = $q->getResultArray();

        $data['barang'] = $hasil;
        return view('templates/jenis-barang', $data);
    }
}
