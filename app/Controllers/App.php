<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class App extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        // Verificar si el usuario está logueado
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login'); // Redirigir si no está logueado
        } else {
            return view('app_gestion/dashboard');
        }

    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }

    public function register() {

        return view('app_gestion/register_view');
    }

    public function login() {

        return view('app_gestion/login_view');
    }


    public function ingresar()
    {
        // Obtener datos del formulario
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Cargar el modelo de usuarios
        $usuarioModel = new \App\Models\UsuariosModel();
        
        // Buscar usuario por email
        $user = $usuarioModel->where('email', $email)->first();
    
        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            // Iniciar sesión
            session()->set('usuario_id', $user['usuario_id']);
            session()->set('nombre', $user['nombre']);
            session()->set('is_logged_in', true);
            
            // Redirigir al dashboard o ruta deseada
            return redirect()->to(base_url('app')); 
        } else {
            // Si las credenciales no son válidas, regresar al login con error
            session()->setFlashdata('error', 'Correo o contraseña incorrectos.');
            return redirect()->to(base_url('/login'));
        }
    }
    

    // Método para cerrar sesión
    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }


    public function registrar() {
        // Obtener los datos del formulario
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');
        
        // Inicializar un array para los errores
        $errors = [];

        // Validar el nombre
        if (empty($name)) {
            $errors[] = 'El nombre es obligatorio.';
        }

        // Validar el email
        if (empty($email)) {
            $errors[] = 'El correo electrónico es obligatorio.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El correo electrónico no es válido.';
        } else {
            // Usar el modelo para verificar si el email ya existe
            $usuarioModel = new UsuarioModel();
            if ($usuarioModel->emailExists($email)) {
                $errors[] = 'El correo electrónico ya está en uso.';
            }
        }

        // Validar la contraseña
        if (empty($password)) {
            $errors[] = 'La contraseña es obligatoria.';
        } elseif (strlen($password) < 6) {
            $errors[] = 'La contraseña debe tener al menos 6 caracteres.';
        } elseif ($password !== $confirm_password) {
            $errors[] = 'Las contraseñas no coinciden.';
        }

        // Si hay errores, devolverlos como respuesta
        if (!empty($errors)) {
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }

        // Si no hay errores, insertar el nuevo usuario
        $data = [
            'nombre' => $name,
            'email' => $email,
            'password' => $password,  // Se hasheará automáticamente en el modelo
            'rol_id' => 1,
        ];

        // Insertar en la base de datos
        $usuarioModel->insert($data);

        // Devolver una respuesta exitosa
        return $this->response->setJSON(['success' => true, 'message' => 'Registro exitoso.']);
    }
    
}
