<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clothes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => true
            ],
            'img' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'name_product' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'slug' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'category' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'description' => [
                'type' => 'text'
            ],
            'price' => [
                'type' => 'decimal',
                'constraint' => '10,2'
            ],
            'stock' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'uuid' => [
                'type' => 'text'
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clothes');
    }

    public function down()
    {
        $this->forge->dropTable('clothes');
    }
}
