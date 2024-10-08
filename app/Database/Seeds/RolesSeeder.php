<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre' => 'admin'],
            ['nombre' => 'editor'],
            ['nombre' => 'usuario'],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
