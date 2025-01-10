<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function create()
    {
        $data['title'] = 'Product';
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        return view('product/create', $data);
    }

    public function edit()
    {
        $data['title'] = 'Add';
        return view('product/edit');
    }

    public function store()
    {
        $productModel = new ProductModel();
        $data = [
            'name_product' => $this->request->getPost('name_product'),
            'description_product' => $this->request->getPost('description_product'),
            'price_product' => $this->request->getPost('price_product'),
        ];

        $productModel->save($data);
        return redirect()->to('/product');
    }
}
