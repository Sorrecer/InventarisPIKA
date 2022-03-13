<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

    protected $allowedFields = ['username', 'email', 'telepon', 'password'];
}
