<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmpDepartment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_employee' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'auto_increment' => false,
            ],
            'no_department' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'auto_increment' => false,
            ],
        ]);
        $this->forge->addPrimaryKey(['id_employee', 'no_department']);
        $this->forge->addForeignKey('id_employee', 'employee', 'id_employee');
        $this->forge->addForeignKey('no_department', 'department', 'no_department');
        $this->forge->createTable('emp_department');
    }

    public function down()
    {
        $this->forge->dropTable('emp_department');
    }
}
