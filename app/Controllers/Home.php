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

        $data = [
            "nombre" => $this->request->getPost("nombre"),
            "apellidos" => $this->request->getPost("apellidos"),
            "email" => $this->request->getPost("email")
        ];

        $modal->createUser($data);
    }
}
