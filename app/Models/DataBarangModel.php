<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'data_barang';

    protected $primaryKey = 'id_barang';

    protected $allowedFields = ['nama_barang', 'id_kategori', 'jumlah_minimal'];
}
