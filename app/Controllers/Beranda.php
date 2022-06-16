<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class Beranda extends BaseController
{
    public function __construct()
    {
        $this->agendaModel = new AgendaModel();
    }
    public function index()
    {
        $db = \Config\Database::connect();
        $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE status = 1')->getResultArray();
        $agenda = $this->agendaModel->getTerdekat();

        $data = [
            'navbar'    => 'beranda',
            'title'     => 'beranda',
            'artikel'   => $artikel,
            'agenda'    => $agenda,
            'validation' => \Config\Services::validation()
        ];

        return view('/user/beranda/index', $data);
    }
}