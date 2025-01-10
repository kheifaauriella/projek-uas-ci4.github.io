<?php

// Pastikan fungsi ini tidak didefinisikan lebih dari satu kali
if (! function_exists('product')) {
    function product($id)
    {
        // Mengakses model ProductModel untuk mengambil data produk
            $ProductModel = new \App\Models\ProductModel();
        
            return $ProductModel->find($id);
        // Mengambil produk berdasarkan ID
    }
}

