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
        $emisoras = $emisoraModel->findAll();
        foreach ($emisoras as &$emisora) {
            $emisora['banners'] = $clienteEmisorasModel->obtenerBannersPorEmisora($emisora['id']);
            foreach ($emisora['banners'] as &$banner) {
                if (!isset($banner->duracion)) {
                    $banner->duracion = 5000; // Duración por defecto en milisegundos (5 segundos)
                }
            }
        }

        return view('index_view', [
            'emisoras' => $emisoras
        ]);
    }
    

    public function registerClick()
    {
        if ($this->request->isAJAX()) {
            $radioId = $this->request->getVar('radio_id');
            $clickModel = new ClickModel();
            $clickModel->incrementClick($radioId);
            return $this->response->setJSON(['status' => 'success']);
        }
    }
    public function registerBannerClick() {
        if ($this->request->isAJAX()) {
            $clienteId = $this->request->getJSON()->cliente_id;
            $clientesModel = new \App\Models\ClientesModel();
            $cliente = $clientesModel->find($clienteId);
            if ($cliente) {
                $cliente['clicks'] = $cliente['clicks'] + 1;
                $clientesModel->save($cliente); 
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Click registrado correctamente',
                    'clicks' => $cliente['clicks']
                ]);
            }
    
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Cliente no encontrado'
            ]);
        }
    
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
