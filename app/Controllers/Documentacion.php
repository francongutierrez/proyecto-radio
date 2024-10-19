<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DocumentacionModel;
use App\Models\UsuariosModel;

class Documentacion extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new DocumentacionModel();

        // Configura la paginación
        $data['documentos'] = $model->paginate(10); // Ajusta el número de elementos por página
        $data['pager'] = $model->pager;
        $data['title'] = 'Documentación';

        return view('app_gestion/documentacion_view', $data); // Asegúrate de que el nombre de la vista sea correcto
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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {
            $model = new DocumentacionModel();
            $data['documento'] = $model->find($id);
            $data['title'] = 'Ver documento';
            return view('app_gestion/ver_documento_view', $data);
        }
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
            $data['title'] = 'Añadir documento';
            

            return view('app_gestion/crear_documento_vista', $data);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        // Verifica si el usuario está logueado
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        // Cargar el helper de formulario
        helper(['form']);

        // Configuración de validación
        $validation =  \Config\Services::validation();
        $this->validate([
            'nombre' => 'required|min_length[3]|max_length[500]',
            'contenido' => [
                'rules' => 'uploaded[contenido]|max_size[contenido,10240]|ext_in[contenido,pdf,doc,docx,jpg,jpeg,png]', // Extensiones permitidas
                'errors' => [
                    'uploaded' => 'El archivo es requerido.',
                    'max_size' => 'El archivo no debe superar los 10 MB.',
                    'ext_in' => 'El archivo debe ser un tipo válido (pdf, doc, docx, jpg, jpeg, png).'
                ]
            ],
        ]);

        // Verifica si hay errores de validación
        if ($this->validator->getErrors()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'contenido' => $this->request->getFile('contenido'), // Obtén el archivo
            'autor' => session()->get('usuario_id'), // Obtener el usuario_id de la sesión
            'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
            'updated_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
        ];

        // Cargar el modelo de documentación
        $documentacionModel = new DocumentacionModel();

        // Mover el archivo a una ubicación específica
        if ($data['contenido']->isValid() && !$data['contenido']->hasMoved()) {
            $fileName = $data['contenido']->getRandomName(); // Genera un nombre aleatorio para el archivo
            $data['contenido']->move(FCPATH . 'uploads/documentos', $fileName); // Mover el archivo a la carpeta 'uploads/documentos'
            $data['contenido'] = $fileName; // Actualiza el nombre del archivo en los datos para guardar en la DB
        } else {
            return redirect()->back()->with('errors', 'Error al mover el archivo.')->withInput();
        }

        // Guardar el documento
        if ($documentacionModel->insert($data)) {
            return redirect()->to(base_url('/app/documentacion'))->with('success', 'Documento creado exitosamente.');
        } else {
            return redirect()->back()->with('errors', 'Error al crear el documento.')->withInput();
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
}
