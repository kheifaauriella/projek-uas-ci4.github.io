<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        // Membuat tabel products
        $this->forge->addField([
            'id'                => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'product_image'     => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'default'        => 'product.svg',
                'null'           => true,
            ],
            'name_product'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false,
            ],
            'description_product' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'price_product'     => [
                'type'           => 'FLOAT',
                'null'           => false,
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at'        => [  // Nama kolom 'deleted_at' sesuai konvensi
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        // Menambahkan primary key pada kolom id
        $this->forge->addKey('id', true);

        // Membuat tabel products
        $this->forge->createTable('products');
    }

    public function down()
    {
        // Menghapus tabel products
        $this->forge->dropTable('products');
    }
}
