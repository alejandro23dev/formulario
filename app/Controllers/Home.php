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
		$Model = new Main_Model();

        $data = array();
        $data['nombre'] = $this->request->getPost('nombre');
        $data['apellidos'] = $this->request->getPost('apellidos');
        $data['email'] = $this->request->getPost('email');

        $Model->createUser($data);
    }

    public function listView()
	{
        // Cargar el modelo de usuarios
        $Model = new Main_Model();

        // Recuperar todos los usuarios de la tabla
        $datos['usuarios'] = $Model->findAll();

		return view ('listView/index', $datos);
    }
}
