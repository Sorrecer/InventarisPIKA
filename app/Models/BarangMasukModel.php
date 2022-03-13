<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barang_masuk';

    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = ['tanggal_masuk', 'nama_barang', 'jumlah_barang', 'jumlah_harga', 'nama_ruang'];
}
