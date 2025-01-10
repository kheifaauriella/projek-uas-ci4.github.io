<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Profile extends BaseController
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
            'title' => 'My Profile',
            'user' => user()
        ];
        return view('profile/myprofile', $data);
    }

    public function edit(): string 
    { 
        $data = [
            'title' => 'Edit Profile',
            'user' => user()
        ];
        
     
        return view('profile/edit', $data);

    }
   
    public function update() 
    { 
        $userModel = new UserModel(); 
        $user = user(); 
        $data = $this->request->getPost(); 
        $defaultImage = 'default.svg';
        

        // Validasi data, kecuali untuk file upload jika tidak ada file yang diunggah 
        $rules = [ 
            'fullname' => 'required|min_length[3]', 
            'bio' => 'permit_empty|max_length[500]', 
            'email' => 'required|valid_email', 
        ];
        
        //memeriksa apakah file gambar diupload
        $image = $this->request->getFile('user_image'); 
       
      

            // Tangani upload gambar  
        if ($image->isValid() && !$image->hasMoved()) 
            { 
                $rules['user_image'] = [ 
                    'uploaded[user_image]', 
                    'mime_in[user_image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[user_image,2048]' 
                ]; 
                $imageName = $image->getRandomName(); 
                if ($image->move('uploads/user_image/', $imageName))
                {
                    $data['user_image'] = $imageName; 

                } else {
                    if (empty($user['user_image'])) 
                    { 
                        $user['user_image'] = 'img/default.svg' . $defaultImage;
                        log_message('error', 'File upload failed:' . $image->getErrorString());
                        return redirect()->back()->withInput()->with('errors', ['uploads/user_image/' => $image->getErrorString()]);
                    }
                }
            }
              // Validasi data 
          
            // Update data pengguna 
            $user->fill($data);
            $userModel->save($user); 

            //notifikasi sukses
            session()->setFlashdata('success', 'Profile updated successfully!');

            // Redirect ke halaman profil dengan pesan sukses 
            return redirect()->to('profile/myprofile'); 
        
    }
}