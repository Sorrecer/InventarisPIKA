<?php

namespace App\Controllers;

class Barang extends BaseController
{
    public function index()
    {
        return view('templates/data-barang');
    }
}