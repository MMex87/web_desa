<?php

namespace App\Controllers;

class Tentang extends BaseController
{
    public function index()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'tentang'
        ];
        return view('/user/tentang/index', $data);
    }
}