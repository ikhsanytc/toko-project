<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
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
            'status' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'order_id' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'payment_type' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'gross_amount' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'img' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'name_product' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'quantity' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'price' => [
                'type' => 'decimal',
                'constraint' => '10,2'
            ],
            'snapToken' => [
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
        $this->forge->createTable('transaction');
    }

    public function down()
    {
        $this->forge->dropTable('transaction');
    }
}
