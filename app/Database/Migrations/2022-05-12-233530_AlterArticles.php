<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterArticles extends Migration
{
    public function up()
    {
        //
        $fields = [
            'create_at datetime default current_timestamp',
            'update_at datetime default current_timestamp on update current_timestamp'
        ];
        $this->forge->addColumn('articles', $fields);
        $this->forge->modifyColumn('articles', ['slug' => [
            'type' => 'TEXT'
        ]]);
    }

    public function down()
    {
        $this->forge->dropColumn('articles', ['create_at', 'update_at']);
        //
    }
}
