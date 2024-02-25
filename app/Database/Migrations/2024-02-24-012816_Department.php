<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Department extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_department' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'auto_increment' => false,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('no_department', true);
        $this->forge->createTable('department');
    }

    public function down()
    {
        $this->forge->dropTable('department');
    }
}
