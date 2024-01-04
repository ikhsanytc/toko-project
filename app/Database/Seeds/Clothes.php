<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Clothes extends Seeder
{
    public function run()
    {
        $name = 'Baju hitam bermerek bjir';
        $this->db->table('clothes')->insert([
            'img' => 'shirt.jpg',
            'name_product' => $name,
            'slug' => url_title($name, '-', true),
            'category' => 'baju',
            'description' => 'Ini adalah baju hitam bermerek bjir.',
            'price' => 50000,
            'stock' => 15,
            'uuid_product' => bin2hex(random_bytes(32)),
        ]);
    }
}
