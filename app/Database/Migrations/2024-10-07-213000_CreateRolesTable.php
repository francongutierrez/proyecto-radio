<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ]
        ]);

        $this->forge->addKey('id', true); // 'id' es clave primaria
        $this->forge->createTable('roles'); // Nombre de la tabla de roles
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
