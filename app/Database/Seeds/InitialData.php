<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialData extends Seeder
{
    public function run()
    {
        $dataInput = \Faker\Factory::create('id_ID');
        for ($i = 1; $i <= 300; $i++) {
            $data = [
                'id_employee' => strtolower($dataInput->userName()),
                'name' => $dataInput->name(),
                'email' => $dataInput->email(),
                'date_accept' => $dataInput->date(),
                'picture' => 'profile.png'
            ];

            $this->db->table('employee')->insert($data);
        }

    }
}
