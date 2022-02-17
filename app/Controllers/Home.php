<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('templates/index');
    }

    public function kategori()
    {
        return view('templates/kategori');
    }

    public function barang()
    {
        return view('templates/data-barang');
    }

    public function barangMasuk()
    {
        return view('templates/barang-masuk');
    }

    public function barangKeluar()
    {
        return view('templates/barang-keluar');
    }

    public function rekap()
    {
        return view('templates/rekap-data-barang');
    }

    public function pengaturan()
    {
        return view('templates/pengaturan-akun');
    }

    public function akunStaff()
    {
        return view('templates/akun-staff');
    }

    public function login()
    {
        return view('templates/login');
    }
}
