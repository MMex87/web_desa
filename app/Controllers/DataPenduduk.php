<?php

namespace App\Controllers;

class DataPenduduk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Penduduk',
            'navbar' => 'data',
        ];

        return view('/admin/datapenduduk/index', $data);
    }
}