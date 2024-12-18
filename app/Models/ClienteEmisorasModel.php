<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteEmisorasModel extends Model
{
    protected $table            = 'cliente_emisoras';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_emisora', 'id_cliente'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function obtenerBannersPorEmisora($emisoraId)
    {
        // Construir la consulta
        return $this->db->table('clientes')
            ->select('clientes.id, clientes.nombre, clientes.contenido AS banner, clientes.url, clientes.duracion') // Agregar el campo 'duracion'
            ->join('cliente_emisoras', 'clientes.id = cliente_emisoras.id_cliente')
            ->where('cliente_emisoras.id_emisora', $emisoraId)
            ->get()
            ->getResult(); // Retorna un array de objetos
    }
    
    
}
