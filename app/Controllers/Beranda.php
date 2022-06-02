<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE status = 1')->getResultArray();

        $data = [
            'navbar'    => 'beranda',
            'title'     => 'beranda',
            'artikel'  => $artikel
        ];

        return view('/user/beranda/index', $data);
    }
}