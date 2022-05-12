<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categories extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'name' => 'Teknologi',
            ],
            [
                'name' => 'Hiburan'
            ],
            [
                'name' => 'Sejarah'
            ]
        ];
        foreach ($datas as $data) {
            $this->db->table('categories')->insert($data);
        };
        //
    }
}
