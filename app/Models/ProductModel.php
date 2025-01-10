<?php

namespace App\Models;

use App\Controllers\ProductController;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';       // Nama tabel produk
    protected $primaryKey = 'id_product';             // Kolom primary key
    protected $returnType     = ProductController::class; 
    protected $useSoftDeletes = null;
    protected $allowedFields = [
        'name_product', 'description_product', 'price_product', 'product_image']; // Kolom yang boleh diisi

    // Menentukan tipe data untuk masing-masing kolom
    protected $useTimestamps  = true;           // Menggunakan timestamps otomatis
    protected $validationRules = [
        'name_product'        => 'required|min_length[3]',
        'description_product' => 'permit_empty|max_length[500]',
        'price_product'       => 'required|decimal',
        'product_image' => 'permit_empty|is_image[product_image]|max_size[product_image,2048]',
    ];
    protected $validationMessages = [
        'name_product' => [
            'required' => 'Nama produk harus diisi.',
            'min_length' => 'Nama produk minimal 3 karakter.'
        ],
        'price_product' => [
            'required' => 'Harga produk harus diisi.',
            'decimal' => 'Harga produk harus berupa angka desimal.'
        ],
        'product_image' => [
            'is_image' => 'File yang diunggah harus berupa gambar.',
            'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB.'
        ]
    ];
    protected $skipValidation = false;
    protected $createdField   = 'created_at';   // Nama kolom untuk created_at
    protected $updatedField   = 'updated_at';   // Nama kolom untuk updated_at

    public function getProducts()
    {
        return $this->builder()->select('id_product, name_product, image_product, price_product')->get()->getResult();
    }

    // Validasi data

}