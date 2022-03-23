<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $allowedFields = ['username', 'email', 'telepon', 'password', 'id_level'];
}
