<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'usuario_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'email', 'password', 'rol_id', 'created_at', 'updated_at', 'deleted_at'];

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
    protected $beforeInsert = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

        // Método para hash de contraseña antes de insertar
        protected function hashPassword(array $data) {
            if (!isset($data['data']['password'])) {
                return $data;
            }
    
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            return $data;
        }
    
        // Método para verificar si un email ya está registrado
        public function emailExists($email) {
            return $this->where('email', $email)->first();
        }
    
    
}
