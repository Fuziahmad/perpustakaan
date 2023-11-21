<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        if(in_groups('anggota')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Controller or its method is not found: \App\Controllers\Register::index");
        }
        
        $data = [
            'title' => 'Register'
        ];
        echo view('header_view',$data);
        echo view('auth/register',$data);
        echo view('footer_view',$data);
    }
}
