<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';

    protected $primaryKey = 'id_staff';

    protected $allowedFields = ['username', 'email', 'telepon', 'password'];
}
