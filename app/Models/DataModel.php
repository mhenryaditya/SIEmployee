<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id_employee';
    protected $useAutoIncrement = 'false';
    protected $allowedFields = ['id_employee', 'name', 'email', 'date_accept', 'picture'];

}