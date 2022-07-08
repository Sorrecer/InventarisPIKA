<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;

class Home extends BaseController
{
    public function index()
    {
        // $label = "";
        // $jumlah = "";
        $BarangMasukModel = new BarangMasukModel();
        $BarangKeluarModel = new BarangKeluarModel();
        $result = $BarangMasukModel->builder()->select('nama_barang, SUM(jumlah_barang) as jumlah')->join('barang', 'barang_masuk.id_barang = barang.id_barang')->groupBy('barang_masuk.id_barang')->orderBy('jumlah', 'DESC')->get(5)->getResultArray();
        $data['barmasuk'] = $result;
        $data['barkeluar'] =  $BarangKeluarModel->builder()->select('nama_barang, SUM(jumlah_barang) as jumlah')->join('barang', 'barang_keluar.id_barang = barang.id_barang')->groupBy('barang_keluar.id_barang')->orderBy('jumlah', 'DESC')->get(5)->getResultArray();
        $data['barangmasuk'] = $BarangMasukModel->builder()->select('SUM(jumlah_barang) as j')->get()->getRowArray()['j'];
        $data['barangkeluar'] = $BarangKeluarModel->builder()->select('SUM(jumlah_barang) as j')->get()->getRowArray()['j'];
        $data['frekuensi'] = $BarangMasukModel->builder()->select('MONTH(tanggal_masuk) AS bulan, SUM(jumlah_barang) AS jumlah')->where('YEAR(tanggal_masuk) = YEAR(NOW())')->groupBy('bulan')->get()->getResultArray();
        return view('templates/index', $data);
    }
}
