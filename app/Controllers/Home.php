<?php namespace App\Controllers;

use App\Models\Main_Model;

class Home extends BaseController
{
	public function index()
	{
		return view('home/index');
	}

	public function createUser()
	{
		if ($this->request->isAJAX()) {
			// Obtiene los datos del formulario enviados por AJAX
			$nombre = $this->request->getPost('nombre');
			$apellidos = $this->request->getPost('apellidos');
			$email = $this->request->getPost('email');
	
			// Instancia el modelo Main_Model y llama al método que guarda los datos en la base de datos
			$model = new Main_Model();
			$model->guardarDatos($nombre, $apellidos, $email);
	
			// Retorna una respuesta vacía (no es necesario retornar nada en este caso)
			return $this->response->setJSON([]);
		} else {
			// Si la petición no es por AJAX, redirige al usuario a otra página
			return redirect()->to('');
		}
	}

	public function listUsuarios()
	{
		return view('home/usuarios');
	}


}
