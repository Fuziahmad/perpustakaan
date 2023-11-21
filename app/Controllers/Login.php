<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        if(logged_in()){
           return redirect()->to(base_url('Buku'));
        }

        $data = [
            'title' => 'Login',
            'config' => config('Auth'),
        ];
        echo view('header_view',$data);
        echo view('auth/login',$data);
        echo view('footer_view',$data);
    }
}


