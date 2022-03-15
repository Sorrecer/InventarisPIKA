<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barang_masuk';

    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = ['tanggal_masuk', 'id_barang', 'jumlah_barang', 'jumlah_harga', 'id_ruang'];
}
