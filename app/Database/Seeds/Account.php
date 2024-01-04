<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Account extends Seeder
{
    public function run()
    {
        $this->db->table('account')->insert([
            'name' => 'ikhsan',
            'email' => 'ikhsanm181209@gmail.com',
            'password' => password_hash('ikhsan123321', PASSWORD_DEFAULT),
            'uuid' => bin2hex(random_bytes(32)),
        ]);
    }
}
