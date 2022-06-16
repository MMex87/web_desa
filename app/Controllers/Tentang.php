<?php

namespace App\Controllers;

class Tentang extends BaseController
{
    public function index()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'tentang',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/tentang/index', $data);
    }
    public function umum()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'umum',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/tentang/umum', $data);
    }
    public function pemerintahan()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'pemerintahan',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/tentang/pemerintahan', $data);
    }
    public function geografi()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'geografi',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/tentang/geografi', $data);
    }
}