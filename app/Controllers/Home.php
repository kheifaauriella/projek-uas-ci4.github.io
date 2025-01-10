<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }
    public function register(): string
    {
        return view('auth/register');
    }
    public function forgot(): string
    {
        return view('auth/forgot');
    }
    public function dash(): string
    {
        $data['title'] = 'Dashboard';
        return view('dashboard/index', $data);
    }
    // public function write(): string
    // {
    //     $data['title'] = 'Dashboard';
    //     return view('dashboard/write', $data);
    // }
  
}
