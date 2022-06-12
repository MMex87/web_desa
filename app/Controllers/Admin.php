<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $notif = $db->query('SELECT COUNT(nama_lengkap) as hitung FROM tbl_surat WHERE status = 1;')->getRow();

        // data view

        $data = [
            'title'     => 'Home',
            'navbar'    => 'home',
            'notif'     => $notif
        ];

        return view('/admin/home/index', $data);
    }
}