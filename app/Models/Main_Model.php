<?php

namespace App\Models;

use CodeIgniter\CLI\Console;
use CodeIgniter\Model;
use CodeIgniter\Database\MySQLi\Builder;

class Main_Model extends Model
{

    public function guardarDatos($nombre, $apellidos, $email)
{
    $data = [
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'email' => $email
    ];

    return $this->db->table('usuarios')->insert($data); // Cambia "tabla" por el nombre de tu tabla en la base de datos
}
}
