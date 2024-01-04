<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Account extends Migration
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
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 355
            ],
            'password' => [
                'type' => 'text'
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
        $this->forge->createTable('account');
    }

    public function down()
    {
        $this->forge->dropTable('account');
    }
}
