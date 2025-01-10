<?php

namespace App\Controllers;

class Admin extends BaseController
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
            'title' => 'Admin',
            'user' => user()
        ];

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        //as userid itu alias --> user nama tabelnya
        //name itu nama grupnya
        $this->builder->select('users.id as userid, username, email, name');

        //join tabel users dengan groups users
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/index', $data);
    }

    public function detail($id = 0): string
    {
        $data = [
            'title' => 'User Detail',
            'user' => user()
        ];
        $defaultImage = 'img/default.svg';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        //as userid itu alias --> user nama tabelnya
        //name itu nama grupnya
        $this->builder->select('users.id as userid, username, email, fullname, phonenumber, bio, user_image, name');

        //join tabel users dengan groups users
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $user = $query->getRow();
                
        if (empty($user)) { 
            return redirect()->to('/admin'); } 
        // Jika gambar profil kosong, set gambar default 
        if (empty($user->user_image)) { $user->user_image = $defaultImage; 
        }    

        $data['user'] = $user;

        return view('admin/detail', $data);
    }
   
}
