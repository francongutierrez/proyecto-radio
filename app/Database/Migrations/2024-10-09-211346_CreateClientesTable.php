<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientesTable extends Migration
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
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'unique'         => true,
            ],
            'fecha_alta' => [
                'type'           => 'DATETIME',
                'unique'         => true,
            ],
            'tipo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'contenido' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'duracion' => [
                'type'       => 'INT',
                'constraint' => '50',
            ],
            'clicks' => [
                'type'       => 'INT',
                'constraint' => '10',
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
        $this->forge->createTable('clientes');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
