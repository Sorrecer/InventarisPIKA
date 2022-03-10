<?php 
namespace App\Models;
use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table = 'barang_keluar';

    protected $primaryKey = 'id_transaksi';
    
    protected $allowedFields = ['tanggal_keluar, nama_barang, jumlah_barang, keterangan, nama_ruang'];
}