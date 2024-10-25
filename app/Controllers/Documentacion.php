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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {
            $model = new DocumentacionModel();


            $data['documentos'] = $model->paginate(10); 
            $data['pager'] = $model->pager;
            $data['title'] = 'Documentación';
    
            return view('app_gestion/documentacion_view', $data);
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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {
            $model = new DocumentacionModel();
            $data['documento'] = $model->getDocumentoConAutor($id); // Llama al método que incluye el autor
            if (!$data['documento']) {
                // Manejo de error si no se encuentra el documento
                return redirect()->to(base_url('/app/documentacion'))->with('error', 'Documento no encontrado');
            }
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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login'));
        }
    
        helper(['form']);
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => [
                'rules' => 'required|min_length[3]|max_length[500]',
                'errors' => [
                    'required' => 'El nombre es requerido',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres',
                    'max_length' => 'El nombre no puede exceder los 500 caracteres'
                ]
            ],
            'contenido' => [
                'rules' => 'uploaded[contenido]|max_size[contenido,10240]|ext_in[contenido,pdf,doc,docx,jpg,jpeg,png]',
                'errors' => [
                    'uploaded' => 'El archivo es requerido.',
                    'max_size' => 'El archivo no debe superar los 10 MB.',
                    'ext_in' => 'El archivo debe ser un tipo válido (pdf, doc, docx, jpg, jpeg, png).'
                ]
            ],
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return view('app_gestion/crear_documento_vista', [
                'validation' => $validation,
                'title' => 'Añadir documento'
            ]);
        }
    
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'contenido' => $this->request->getFile('contenido'),
            'autor' => session()->get('usuario_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    
        $documentacionModel = new DocumentacionModel();
    
        if ($data['contenido']->isValid() && !$data['contenido']->hasMoved()) {
            $fileName = $data['contenido']->getRandomName();
            try {
                $data['contenido']->move(FCPATH . 'uploads/documentos', $fileName);
                $data['contenido'] = $fileName;
            } catch (\Exception $e) {
                return view('app_gestion/crear_documento_vista', [
                    'validation' => $validation,
                    'title' => 'Añadir documento',
                    'error' => 'Error al mover el archivo.'
                ]);
            }
        } else {
            return view('app_gestion/crear_documento_vista', [
                'validation' => $validation,
                'title' => 'Añadir documento',
                'error' => 'Error al procesar el archivo.'
            ]);
        }
    
        try {
            if ($documentacionModel->insert($data)) {
                return redirect()->to(base_url('/app/documentacion'))
                               ->with('success', 'Documento creado exitosamente.');
            }
        } catch (\Exception $e) {
            return view('app_gestion/crear_documento_vista', [
                'validation' => $validation,
                'title' => 'Añadir documento',
                'error' => 'Error al crear el documento.'
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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login')); 
        } else {
            helper(['form']);
            $model = new DocumentacionModel();
            $data['documento'] = $model->find($id);
            $data['title'] = 'Editar documento';
            return view('app_gestion/editar_documento_vista', $data);
        }
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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login'));
        }
    
        helper(['form']);
        $documentoModel = new \App\Models\DocumentacionModel();
        $documento = $documentoModel->find($id);
    
        if (!$documento) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Documento no encontrado');
        }
    

        $rules = [
            'nombre' => 'required|min_length[3]|max_length[500]',
            'contenido' => 'max_size[contenido,10240]', // 10MB
        ];
    
    
        if ($this->validate($rules)) {


            $file = $this->request->getFile('contenido');
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'updated_at' => date('Y-m-d H:i:s'), 
            ];

            if ($file && $file->isValid() && !$file->hasMoved()) {



                $oldFilePath = FCPATH . 'uploads/documentos/' . $documento['contenido'];
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); 
                }

                // Mover el archivo nuevo
                $newFileName = $file->getRandomName(); 
                $file->move(FCPATH . 'uploads/documentos', $newFileName);

                $data['contenido'] = $newFileName; 
            }

            $documentoModel->update($id, $data);


            return redirect()->to(base_url('/app/documentacion'))->with('message', 'Documento actualizado con éxito.');
        } else {
            log_message('error', 'Validación fallida: ' . json_encode($this->validator->getErrors()));
        }
    
        $data['validation'] = $this->validator;
        $data['documento'] = $documento;
        $data['title'] = 'Editar Documento';
        return view('app_gestion/editar_documento_vista', $data);
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
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('/login'));
        }
    
        $documentoModel = new \App\Models\DocumentacionModel();
        $documento = $documentoModel->find($id);
    
        if (!$documento) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Documento no encontrado');
        }
    

        $filePath = FCPATH . 'uploads/documentos/' . $documento['contenido'];
    

        if (file_exists($filePath)) {
            unlink($filePath); 
        }
    
        $documentoModel->delete($id);
    
        return redirect()->to(base_url('/app/documentacion'))->with('message', 'Documento eliminado con éxito.');
    }
    
}
