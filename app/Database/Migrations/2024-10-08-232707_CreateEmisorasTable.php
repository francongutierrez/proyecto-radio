<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmisorasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'telefono' => [
                'type' => 'INT',
                'constraint' => '20',
            ],
            'frecuencia' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('emisoras');
    }

    public function down()
    {
        $this->forge->dropTable('emisoras');
    }
}
