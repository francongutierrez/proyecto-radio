<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ClientesModel;
use App\Models\EmisorasModel;
use App\Models\ClienteEmisorasModel;

class Clientes extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    protected $emisorasModel;

    public function __construct()
    {
         $this->emisorasModel = new EmisorasModel();
    }
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
        $clientModel = new ClientesModel();
        $clienteEmisorasModel = new ClienteEmisorasModel();
    
        $client = $clientModel->find($id);
        
        if (!$client) {
            return redirect()->to(base_url('/app/clientes'))->with('error', 'Cliente no encontrado.');
        }
    
        $clientEmisoras = $clienteEmisorasModel->where('id_cliente', $id)->findColumn('id_emisora');
    
        $data = [
            'title' => 'Detalles del Cliente',
            'client' => $client,
            'clientEmisoras' => $clientEmisoras,
        ];
    
        return view('app_gestion/ver_cliente_vista', $data);
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
    

            $emisorasModel = new \App\Models\EmisorasModel(); 
            $emisoras = $emisorasModel->findAll(); 
            
            $data = [
                'title' => 'Crear cliente',
                'emisoras' => $emisoras,
            ];
    
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
        helper(['form']);

        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {

            $clienteModel = new ClientesModel();
            $clienteEmisorasModel = new ClienteEmisorasModel(); 

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
                $file = $this->request->getFile('contenido');
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName(); 
                    $file->move(FCPATH . 'img/uploads', $newName); 
                }

                // Insertar los datos en la base
                $clienteId = $clienteModel->insert([
                    'nombre'     => $this->request->getPost('nombre'),
                    'email'      => $this->request->getPost('email'),
                    'telefono'   => $this->request->getPost('telefono'),
                    'url'        => $this->request->getPost('url'),
                    'fecha_alta' => $this->request->getPost('fecha_alta'),
                    'contenido'  => $newName, 
                    'duracion'   => $this->request->getPost('duracion'),
                    'created_at' => date('Y-m-d H:i:s'), 
                    'updated_at' => date('Y-m-d H:i:s'), 
                ]);

                $emisorasSeleccionadas = $this->request->getPost('emisoras');

                if (!empty($emisorasSeleccionadas)) {
                    foreach ($emisorasSeleccionadas as $emisoraId) {
                        $clienteEmisorasModel->save([
                            'id_cliente' => $clienteId,
                            'id_emisora' => $emisoraId
                        ]);
                    }
                }

                return redirect()->to(base_url('/app/clientes'))->with('success', 'Cliente creado exitosamente');
            } else {
                return view('app_gestion/crear_cliente_vista', [
                    'validation' => $this->validator,
                    'title' => 'Agregar Cliente',
                    'emisoras' => $this->emisorasModel->findAll() 
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
        $clientModel = new ClientesModel();
        $emisorasModel = new \App\Models\EmisorasModel();
        $clienteEmisorasModel = new ClienteEmisorasModel(); 
    
        $client = $clientModel->find($id);
    
        if (!$client) {
            return redirect()->to(base_url('/app/clientes'))->with('error', 'Cliente no encontrado');
        }
    
        $emisoras = $emisorasModel->findAll();
        $clientEmisoras = $clienteEmisorasModel->where('id_cliente', $id)->findColumn('id_emisora');
    
        $data = [
            'title' => 'Editar cliente',
            'client' => $client,
            'emisoras' => $emisoras, 
            'clientEmisoras' => $clientEmisoras 
        ];
    
        return view('app_gestion/editar_cliente_vista', $data);
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
        $clienteEmisorasModel = new ClienteEmisorasModel();
        
        $validation = \Config\Services::validation();

        $imageRules = $this->request->getFile('contenido') !== null 
        ? [
            'contenido' => [
                'uploaded[contenido]',
                'mime_in[contenido,image/jpg,image/jpeg,image/png]',
                'max_size[contenido,2048]',
            ]
        ] 
        : [];
            
        $validation->setRules([
            'nombre'  => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'telefono' => 'required',
            'fecha_alta' => 'required',
            'duracion' => 'required|numeric',
        ]);
    
        if ($validation->withRequest($this->request)->run()) {
            $updatedData = [
                'nombre'  => $this->request->getPost('nombre'),
                'email' => $this->request->getPost('email'),
                'telefono' => $this->request->getPost('telefono'),
                'fecha_alta' => $this->request->getPost('fecha_alta'),
                'duracion' => $this->request->getPost('duracion'),
                'url' => $this->request->getPost('url'),
            ];
    
            $file = $this->request->getFile('contenido');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'img/uploads', $newName);
                $updatedData['contenido'] = $newName; 
            }
    
            $clientModel->update($id, $updatedData);
            $clienteEmisorasModel->where('id_cliente', $id)->delete();
    
            $emisorasSeleccionadas = $this->request->getPost('emisoras');
            if (!empty($emisorasSeleccionadas)) {
                foreach ($emisorasSeleccionadas as $emisoraId) {
                    $clienteEmisorasModel->save([
                        'id_cliente' => $id,
                        'id_emisora' => $emisoraId
                    ]);
                }
            }
    
            return redirect()->to(base_url('/app/clientes'))->with('success', 'Cliente actualizado exitosamente');
        }
    
        return view('app_gestion/editar_cliente_vista', [
            'validation' => $validation, 
            'client' => $clientModel->find($id),
            'emisoras' => (new \App\Models\EmisorasModel())->findAll(),
            'clientEmisoras' => $clienteEmisorasModel->where('id_cliente', $id)->findColumn('id_emisora'), 
            'title' => 'Editar cliente' 
        ]);
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
        $clientModel = new ClientesModel();
        $clienteEmisorasModel = new ClienteEmisorasModel();
        $client = $clientModel->find($id);
        
        if ($client) {
            // Primero, elimina las relaciones de emisoras
            $clienteEmisorasModel->where('id_cliente', $id)->delete();
            
            // Eliminar el archivo del banner si existe
            $filePath = FCPATH . 'img/uploads/' . $client['contenido']; // Ruta completa al archivo
            if (file_exists($filePath)) {
                unlink($filePath); // Elimina el archivo
            }
            
            // Luego, elimina el cliente
            $clientModel->delete($id);
            
            return redirect()->to(base_url('/app/clientes'))->with('success', 'Cliente eliminado exitosamente');
        } else {
            return redirect()->to(base_url('/app/clientes'))->with('error', 'Cliente no encontrado');
        }
    }
    
      
}
