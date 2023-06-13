<?php

namespace App\Controllers;

use App\Models\Main_Model;

class Home extends BaseController
{

	public function index()
	{
		return view('home/index');
	}

	public function createUser()
	{
		$modal = new Main_Model();

        // Obtener los datos del formulario AJAX
        $nombre = $this->request->getPost('nombre');
		$apellidos = $this->request->getPost('apellidos');
        $email = $this->request->getPost('email');
        

        // Insertar los datos en la base de datos utilizando el modelo Main_Model
        $result = $this->$modal->createUser($nombre, $apellidos, $email);

        // Si todo salió bien, enviar una respuesta de éxito
        echo json_encode(array('success' => true));

        return ($result);
    }
}
