<?php

namespace App\Models;

use CodeIgniter\CLI\Console;
use CodeIgniter\Model;
use CodeIgniter\Database\MySQLi\Builder;

class Main_Model extends Model
{

    protected $table = 'usuarios';
    protected $allowedFields = ['id', 'nombre', 'apellidos', 'email'];

    public function createUser($data) 
    {
        $return = array();

        $query = $this->db->table('usuarios')
            ->insert($data);

        if ($query->resultID == true) {
            $return['error'] = 0;
            $return['id'] = $query->connID->insert_id;
        } else
            $return['error'] = 1;

        return $return;
    }
}