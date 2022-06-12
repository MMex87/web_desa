<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $notif = $db->query('SELECT COUNT(nama_lengkap) as hitung FROM tbl_surat WHERE status = 1;')->getRow();
        $notif2 = $db->query('SELECT COUNT(nama) as hitung FROM tbl_surat_kedua WHERE status = 1;')->getRow();

        // data view

        $data = [
            'title'     => 'Home',
            'navbar'    => 'home',
            'notif'     => $notif,
            'notif2'     => $notif2,
        ];

        return view('/admin/home/index', $data);
    }
}