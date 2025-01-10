<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class User extends BaseController
{

    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');

    }

    public function index(): string
    {
        $data = [
            'title' => 'Profile Management',
            'user' => user()
        ];
        
        $this->builder->select('users.id as userid, username, email');
        $this->builder->where('users.id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

      
        return view('user/index', $data);
    }
}
