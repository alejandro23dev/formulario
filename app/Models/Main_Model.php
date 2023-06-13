<?php

namespace App\Models;

use CodeIgniter\CLI\Console;
use CodeIgniter\Model;
use CodeIgniter\Database\MySQLi\Builder;

class Main_Model extends Model
{
    
    public function createUser($nombre, $apellidos ,$email) 
    {

        $model = new Main_Model();

        $data = array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email
        );

        // Insertar los datos en la tabla de usuarios
        $result = $this->$model->db->insert('usuarios', $data);

        return $result;
    }
}