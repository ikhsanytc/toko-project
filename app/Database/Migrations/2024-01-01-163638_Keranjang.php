<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keranjang extends Migration
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
            'uuid_user' => [
                'type' => 'text'
            ],
            'uuid_product' => [
                'type' => 'text'
            ],
            'quantity' => [
                'type' => 'int'
            ],
            'img' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'price' => [
                'type' => 'decimal',
                'constraint' => '10,2'
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
        $this->forge->createTable('keranjang');
    }

    public function down()
    {
        $this->forge->dropTable('keranjang');
    }
}
