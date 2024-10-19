<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDocumentacionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
            ],
            'contenido' => [
                'type' => 'VARCHAR',
                'constraint' => '1000',
            ],
            'autor' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('autor', 'usuarios', 'usuario_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('documentacion');
    }

    public function down()
    {
        $this->forge->dropTable('documentacion');
    }
}
