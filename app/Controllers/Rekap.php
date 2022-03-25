<?php

namespace App\Controllers;

class Rekap extends BaseController
{
    public function index()
    {
        $data = [
            'tipe' => '',
            'tanggalAwal' => $this->request->getVar('tanggal-awal'),
            'tanggalAkhir' => $this->request->getVar('tanggal-akhir')
        ];

        return view('templates/rekap-data-barang', $data);
    }

    public function cari()
    {

        //barangmasuk
        $db = \Config\Database::connect();
        $sql = "SELECT M.id_transaksi, M.tanggal_masuk, B.nama_barang,
        M.jumlah_barang, M.jumlah_harga, R.nama_ruang
        FROM barang_masuk M
        JOIN barang B, ruang R
        WHERE M.id_barang = B.id_barang
        AND M.id_ruang = R.id_ruang;";
        $q = $db->query($sql);
        $barangmasuk = $q->getResultArray();

        //barangkeluar
        $sql1 = "SELECT K.id_transaksi, K.tanggal_keluar, B.nama_barang,
        K.jumlah_barang, K.keterangan, R.nama_ruang
        FROM barang_keluar K
        JOIN barang B, ruang R
        WHERE K.id_barang = B.id_barang
        AND K.id_ruang = R.id_ruang;";
        $w = $db->query($sql1);
        $barangkeluar = $w->getResultArray();

        //barang
        $sql2 = "SELECT B.nama_barang,
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
        $e = $db->query($sql2);
        $barang = $e->getResultArray();

        $data['databarang'] = $barang;

        $data['barang_keluar'] = $barangkeluar;

        $data['barang_masuk'] = $barangmasuk;

        $data = [
            'tipe' => $this->request->getVar('tipe'),
            'tanggalAwal' => $this->request->getVar('tanggal-awal'),
            'tanggalAkhir' => $this->request->getVar('tanggal-akhir')
        ];

        // dd($data['tipe']);

        return view('templates/rekap-data-barang', $data);
    }

    public function print()
    {
        $data = [
            'tipe' => $this->request->getVar('tipe'),
            'tanggalAwal' => $this->request->getVar('tanggal-awal'),
            'tanggalAkhir' => $this->request->getVar('tanggal-akhir')
        ];
        // dd($data['tanggalAwal']);

        //barangmasuk
        $db = \Config\Database::connect();
        $sql = "SELECT M.id_transaksi, M.tanggal_masuk, B.nama_barang,
        M.jumlah_barang, M.jumlah_harga, R.nama_ruang
        FROM barang_masuk M
        JOIN barang B, ruang R
        WHERE M.id_barang = B.id_barang
        AND M.id_ruang = R.id_ruang;";
        $q = $db->query($sql);
        $barangmasuk = $q->getResultArray();

        //barangkeluar
        $sql1 = "SELECT K.id_transaksi, K.tanggal_keluar, B.nama_barang,
        K.jumlah_barang, K.keterangan, R.nama_ruang
        FROM barang_keluar K
        JOIN barang B, ruang R
        WHERE K.id_barang = B.id_barang
        AND K.id_ruang = R.id_ruang;";
        $w = $db->query($sql1);
        $barangkeluar = $w->getResultArray();

        //barang
        $sql2 = "SELECT B.nama_barang,
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
        $e = $db->query($sql2);
        $barang = $e->getResultArray();

        $data['databarang'] = $barang;

        $data['barang_keluar'] = $barangkeluar;

        $data['barang_masuk'] = $barangmasuk;

        return view('templates/print-rekap-data', $data);
    }
}
