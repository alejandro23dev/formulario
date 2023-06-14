<?php

namespace App\Models;

use CodeIgniter\CLI\Console;
use CodeIgniter\Model;
use CodeIgniter\Database\MySQLi\Builder;

class Main_Model extends Model
{
    
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellidos', 'email'];

    public function createUser($data) 
    {
        return $this->insert($data);
    }
}