<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class AuthModel extends Model
{
    protected $table = 'emp_accout';
    protected $primaryKey = 'id_employee';
    protected $useAutoIncrement = 'false';
    protected $allowedFields = ['id_employee', 'usr', 'pass'];

    function getUsr()
    {

    }
}