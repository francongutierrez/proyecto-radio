<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ClientesModel;

class Clientes extends ResourceController
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
            $clienteModel = new ClientesModel();
        
            $perPage = 10;
            $page = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1;
    
    
            $clientes = $clienteModel->paginate($perPage);
            $pager = $clienteModel->pager; 
            $data = [
                'title' => 'Clientes',
                'clientes' => $clientes,
                'pager' => $pager,
            ];
    
            return view('app_gestion/clientes', $data);
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
            $data['title'] = 'Crear cliente';
            return view('app_gestion/crear_cliente_vista', $data);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        helper(['form']); // Cargar el helper de formulario
    
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {
    
            $clienteModel = new ClientesModel();
    
            // Configurar las reglas de validación
            $rules = [
                'nombre' => 'required',
                'email' => 'required|valid_email',
                'telefono' => 'required',
                'fecha_alta' => 'required',
                'contenido' => [
                    'uploaded[contenido]',
                    'mime_in[contenido,image/jpg,image/jpeg,image/png]',
                    'max_size[contenido,2048]', // Tamaño máximo: 2MB
                ],
                'duracion' => 'required|numeric'
            ];
    
            if ($this->validate($rules)) {
                // Guardar el archivo subido
                $file = $this->request->getFile('contenido');
                if ($file->isValid() && !$file->hasMoved()) {
                    // Mover el archivo a la carpeta 'uploads'
                    $newName = $file->getRandomName(); // Genera un nombre aleatorio
                    $file->move(WRITEPATH . 'uploads', $newName);
    
                    // Puedes obtener la ruta completa del archivo:
                    $filePath = WRITEPATH . 'uploads/' . $newName;
                }
    
                // Insertar los datos en la base
                $clienteModel->save([
                    'nombre'     => $this->request->getPost('nombre'),
                    'email'      => $this->request->getPost('email'),
                    'telefono'   => $this->request->getPost('telefono'),
                    'fecha_alta' => $this->request->getPost('fecha_alta'),
                    'contenido'  => $newName, 
                    'duracion'   => $this->request->getPost('duracion'),
                    'created_at' => date('Y-m-d H:i:s'), // Cambia esto para usar la fecha actual
                    'updated_at' => date('Y-m-d H:i:s'), // Cambia esto para usar la fecha actual
                ]);
    
                return redirect()->to(base_url('/app/clientes'))->with('success', 'Cliente creado exitosamente');
            } else {
                // Si la validación falla, devolver errores
                return view('app_gestion/crear_cliente_vista', [
                    'validation' => $this->validator,
                    'title' => 'Agregar Cliente'
                ]);
            }
        }
    
        return view('app_gestion/crear_cliente_vista', ['title' => 'Agregar Cliente']);
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
        // Cargar el modelo de cliente
        $clientModel = new ClientesModel();

        // Buscar el cliente por ID
        $client = $clientModel->find($id);

        $data['title'] = 'Editar cliente';
        $data['client'] = $client;



        // Cargar la vista con los datos del cliente
        echo view('app_gestion/editar_cliente_vista', $data);
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
        $clientModel = new ClientesModel();

        // Validar los datos del formulario
        $validation = \Config\Services::validation();
            
        $validation->setRules([
            'nombre'  => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            // Obtener los datos del formulario
            $updatedData = [
                'nombre'  => $this->request->getPost('nombre'),
                'email' => $this->request->getPost('email'),
           ];

            // Actualizar el cliente
            $clientModel->update($id, $updatedData);

            // Redirigir con un mensaje de éxito
            return redirect()->to(base_url('/app/clientes'))->with('success', 'Cliente actualizado exitosamente');
        }
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
        // Cargar el modelo de cliente
        $clientModel = new ClientesModel();

        // Verificar si el cliente existe
        $client = $clientModel->find($id);

        if ($client) {
            // Si el cliente existe, eliminarlo
            $clientModel->delete($id);

            // Redirigir a la lista de clientes con un mensaje de éxito
            return redirect()->route('app/clientes')->with('success', 'Cliente eliminado exitosamente');
        } else {
            // Si el cliente no existe, redirigir con un mensaje de error
            return redirect()->route('app/clientes')->with('error', 'Cliente no encontrado');
        }
    }
}
