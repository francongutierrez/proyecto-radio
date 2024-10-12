<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClienteEmisorasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_emisora' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ],
            'id_cliente' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cliente_emisoras');
    }

    public function down()
    {
        $this->forge->dropTable('cliente_emisoras');
    }
}
