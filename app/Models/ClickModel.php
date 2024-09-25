<?php

namespace App\Models;

use CodeIgniter\Model;

class ClickModel extends Model
{
    protected $table = 'radio_clicks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['radio_id', 'clicks'];

    public function incrementClick($radioId)
    {
        // Verificar si la radio ya existe en la base de datos
        $radio = $this->where('radio_id', $radioId)->first();

        if ($radio) {
            // Incrementar el contador de clics
            $this->set('clicks', 'clicks + 1', FALSE)
                 ->where('radio_id', $radioId)
                 ->update();
        } else {
            // Insertar nuevo registro si no existe
            $this->insert(['radio_id' => $radioId, 'clicks' => 1]);
        }
    }
}
