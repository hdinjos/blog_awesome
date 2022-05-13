<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Articles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'author_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'slug' => [
                'type' => 'TEXT',
            ],
            'status'      => [
                'type'           => 'ENUM',
                'constraint'     => ['publish', 'pending', 'draft'],
                'default'        => 'pending',
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'image' => [
                'type' => 'TEXT',
                'default' => 'default_img'
            ],
            'create_at datetime default current_timestamp',
            'update_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('articles');
    }

    public function down()
    {
        $this->forge->dropTable('articles');
        //
    }
}
