<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuariosModel;

class Usuarios extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {
            $usuarioModel = new UsuariosModel();
        
            $perPage = 10;
            $page = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1;
    
    
            $usuarios = $usuarioModel->paginate($perPage);
            $pager = $usuarioModel->pager; 
            $data = [
                'title' => 'Usuarios',
                'usuarios' => $usuarios,
                'pager' => $pager,
            ];
            return view('app_gestion/usuarios_vista', $data);
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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {
            helper(['form']);
            $data['title'] = 'Añadir usuario';
            return view('app_gestion/crear_usuario_vista', $data);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        // Validar los datos del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'El nombre es requerido',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres',
                    'max_length' => 'El nombre no puede exceder los 50 caracteres'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'El email es requerido',
                    'valid_email' => 'Por favor ingrese un email válido',
                    'is_unique' => 'Este email ya está registrado'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[255]',
                'errors' => [
                    'required' => 'La contraseña es requerida',
                    'min_length' => 'La contraseña debe tener al menos 6 caracteres',
                    'max_length' => 'La contraseña no puede exceder los 255 caracteres'
                ]
            ],
            'rol' => [
                'rules' => 'required|in_list[1,2,3]',
                'errors' => [
                    'required' => 'El rol es requerido',
                    'in_list' => 'Por favor seleccione un rol válido'
                ]
            ]
        ]);
    
        // Si la validación falla
        if (!$validation->withRequest($this->request)->run()) {
            // Renderizar la vista con los errores
            return view('app_gestion/crear_usuario_vista', [
                'validation' => $validation,
                'title' => 'Añadir usuario'
            ]);
        }
    
        // Obtener los datos del formulario
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $rol = $this->request->getPost('rol');
    
        // Crear el nuevo usuario
        $usuarioModel = new \App\Models\UsuariosModel();
    
        $data = [
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password,
            'rol_id' => $rol,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    
        try {
            $usuarioModel->insert($data);
            return redirect()->to(base_url('/app/usuarios'))->with('success', 'Usuario añadido exitosamente.');
        } catch (\Exception $e) {
            return view('app_gestion/crear_usuario_vista', [
                'validation' => $validation,
                'title' => 'Añadir usuario',
                'error' => 'Hubo un error al crear el usuario. Por favor, intente nuevamente.'
            ]);
        }
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
        // Cargar el modelo de usuario
        $usuarioModel = new \App\Models\UsuariosModel();
    
        // Buscar el usuario por ID
        $usuario = $usuarioModel->find($id);
    
        // Verificar si el usuario existe
        if (!$usuario) {
            // Si no existe, redirigir con un mensaje de error
            return redirect()->to('/app/usuarios')->with('error', 'Usuario no encontrado.');
        }
    
        // Cargar los roles para el formulario
        $rolModel = new \App\Models\RolesModel();
        $roles = $rolModel->findAll();
    
        // Pasar los datos a la vista
        return view('app_gestion/editar_usuarios_vista', [
            'usuario' => $usuario,
            'roles' => $roles,
            'title' => 'Editar usuario',
        ]);
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
        // Cargar el modelo de usuario
        $usuarioModel = new \App\Models\UsuariosModel();
    
        // Validar los datos del formulario
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'password' => 'permit_empty|min_length[6]|max_length[255]', // Permitir vacío
            'rol' => 'required|in_list[1,2,3]',
        ]);
    
        if (!$this->validate($validation->getRules())) {
            // Si la validación falla, volver a mostrar el formulario con errores
            return redirect()->to('/app/usuarios/edit/' . esc($id))->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Obtener los datos del formulario
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password'); // Obtener la contraseña sin hashear
    
        // Crear el nuevo usuario
        $data = [
            'nombre' => $nombre,
            'email' => $email,
            'rol_id' => $this->request->getPost('rol'),
            'updated_at' => date('Y-m-d H:i:s'), // Timestamp de actualización
        ];
    
    
        // Actualizar el usuario
        $usuarioModel->update($id, $data);
    
        // Redireccionar con mensaje de éxito
        return redirect()->to('/app/usuarios')->with('success', 'Usuario actualizado exitosamente.');
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
        // Cargar el modelo de usuario
        $usuarioModel = new \App\Models\UsuariosModel();

        // Verificar si el usuario existe
        if (!$usuarioModel->find($id)) {
            // Si no existe, redirigir con un mensaje de error
            return redirect()->to(base_url('/app/usuarios'))->with('error', 'Usuario no encontrado.');
        }

        // Eliminar el usuario
        $usuarioModel->delete($id);

        // Redirigir con mensaje de éxito
        return redirect()->to(base_url('/app/usuarios'))->with('success', 'Usuario eliminado exitosamente.');
    }



    public function register() {

        return view('app_gestion/register_view');
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
