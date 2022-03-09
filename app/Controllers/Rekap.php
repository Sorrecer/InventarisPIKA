<?php

namespace App\Controllers;

class Rekap extends BaseController
{
    public function index()
    {
        return view('templates/rekap-data-barang');
    }
}