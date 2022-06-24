<?php

namespace App\Models;

use CodeIgniter\Model;

class BarMasukModel extends Model
{
    protected $table = 'bar_masuk';

    protected $primaryKey = 'id_barang';

    protected $allowedFields = ['jum'];
}
