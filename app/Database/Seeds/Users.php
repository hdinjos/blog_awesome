<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        //
        $datas = [
            [
                'name' => 'Admin blog',
                'bio' => 'Admin blog keren :)',
                'email' => 'admin@awesomeblog.com',
                'password' => '123',
                'role_id' => 1
            ],
            [
                'name' => 'Ilham Saqoc',
                'bio' => 'Penulis pertama di blog ini',
                'email' => 'ilhams@awesomeblog.com',
                'password' => '123',
                'role_id' => 2
            ]
        ];
        foreach ($datas as $data) {
            $this->db->table('users')->insert($data);
        };
    }
}
