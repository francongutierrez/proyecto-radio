<?php

namespace App\Controllers;

use App\Models\ClickModel;
use App\Models\EmisorasModel;
use App\Models\ClientesModel;
use App\Models\ClienteEmisorasModel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Home extends BaseController
{
    public function index(): string
    {
        $emisoraModel = new EmisorasModel();
        $clienteEmisorasModel = new ClienteEmisorasModel();

        // Obtener todas las emisoras
        $emisoras = $emisoraModel->findAll();

        // Asociar cada emisora con sus banners usando el modelo ClienteEmisorasModel
        foreach ($emisoras as &$emisora) {
            // Obtener los banners para cada emisora
            $emisora['banners'] = $clienteEmisorasModel->obtenerBannersPorEmisora($emisora['id']);
        }

        // Pasar los datos a la vista
        return view('index_view', [
            'emisoras' => $emisoras
        ]);
    }

    public function registerClick()
    {
        // Verifica si la solicitud es AJAX
        if ($this->request->isAJAX()) {
            $radioId = $this->request->getVar('radio_id');

            // Cargar el modelo
            $clickModel = new ClickModel();

            // Actualiza los clics en la base de datos
            $clickModel->incrementClick($radioId);

            return $this->response->setJSON(['status' => 'success']);
        }
    }
    public function registerBannerClick() {
        // Asegurarse de que sea una solicitud AJAX
        if ($this->request->isAJAX()) {
            $clienteId = $this->request->getJSON()->cliente_id;
    
            // Cargar el modelo de Cliente
            $clientesModel = new \App\Models\ClientesModel();
    
            // Obtener el cliente y aumentar el número de clics
            $cliente = $clientesModel->find($clienteId);
    
            if ($cliente) {
                $cliente['clicks'] = $cliente['clicks'] + 1;
                $clientesModel->save($cliente);  // Guardar los cambios
    
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Click registrado correctamente',
                    'clicks' => $cliente['clicks']
                ]);
            }
    
            // Si el cliente no se encuentra
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Cliente no encontrado'
            ]);
        }
    
        // Si no es una solicitud AJAX
        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'message' => 'Solicitud inválida'
        ]);
    }
    



    public function appIndex()
    {
        return view('app_gestion/dashboard');
    }
}
