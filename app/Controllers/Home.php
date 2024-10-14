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

    public function appIndex()
    {
        return view('app_gestion/dashboard');
    }
}
