<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        //
        $datas = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Writer'
            ]
        ];
        foreach ($datas as $data) {
            $this->db->table('roles')->insert($data);
        };
    }
}
