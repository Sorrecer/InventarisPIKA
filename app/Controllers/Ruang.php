<?php

namespace App\Controllers;

use App\Models\RuangModel;

class Ruang extends BaseController
{
    public function index()
    {
        // return view('templates/ruang');
        $RuangModel = new RuangModel();
        $data['ruang'] = $RuangModel->orderBy('id_ruang', 'nama_ruang')->findAll();
        return view('templates/ruang', $data);
    }

    //tambah

    public function tambah()
    {
        return view('templates/tambah-ruang');
    }

    public function store()
    {
        $RuangModel = new RuangModel();
        $data = [
            'nama_ruang' => $this->request->getVar('nama_ruang'),
        ];

        $RuangModel->insert($data);
        return $this->response->redirect(base_url('/ruang'));
    }

    // edit

    public function edit($id_ruang)
    {
        $RuangModel = new RuangModel();
        $data['ruang'] = $RuangModel->where('id_ruang', $id_ruang)->first();
        return view('templates/edit-ruang', $data);
    }

    public function update()
    {
        $RuangModel = new RuangModel();
        $id = $this->request->getVar('id_ruang');
        $data = [
            'nama_ruang' => $this->request->getVar('nama_ruang'),
        ];
        $RuangModel->update($id, $data);
        return $this->response->redirect(base_url('/ruang'));
    }

    //delete

    public function delete($id_ruang = null)
    {
        $RuangModel = new RuangModel();
        $data['ruang'] = $RuangModel->where('id_ruang', $id_ruang)->delete($id_ruang);
        return $this->response->redirect(base_url('/ruang'));
    }
}
