<?php

namespace App\Controllers;

class Rekap extends BaseController
{
    public function index()
    {
        return view('templates/rekap-data-barang');
    }

    public function print()
    {
        return view('templates/print-rekap-data');
    }
}
