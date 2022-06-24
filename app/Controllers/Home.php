<?php

namespace App\Controllers;

use App\Models\BarMasukModel;

class Home extends BaseController
{
    public function index()
    {
        // $label = "";
        // $jumlah = "";

        $BarMasukModel = new BarMasukModel();
        $data['barmasuk'] = $BarMasukModel->orderBy('id_barang')->findAll();
        dd($BarMasukModel);
        return view('templates/index', $data);
    }
}
