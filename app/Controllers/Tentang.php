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
    public function umum()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'umum'
        ];
        return view('/user/tentang/umum', $data);
    }
    public function pemerintahan()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'pemerintahan'
        ];
        return view('/user/tentang/pemerintahan', $data);
    }
    public function geografi()
    {
        $data = [
            'navbar' => 'tentang',
            'title' => 'geografi'
        ];
        return view('/user/tentang/geografi', $data);
    }
}