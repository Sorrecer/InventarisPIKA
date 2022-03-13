<?php

namespace App\Models;

use CodeIgniter\Model;

class RuangModel extends Model
{
    protected $table = 'ruang';

    protected $primaryKey = 'id_ruang';

    protected $allowedFields = ['nama_ruang'];
}
