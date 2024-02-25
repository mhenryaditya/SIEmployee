<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmpAccout extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_employee' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'auto_increment' => false,
            ],
            'usr' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pass' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_employee', true);
        $this->forge->addForeignKey('id_employee', 'employee', 'id_employee');
        $this->forge->createTable('emp_account');
    }

    public function down()
    {
        $this->forge->dropTable('emp_account');
    }
}
