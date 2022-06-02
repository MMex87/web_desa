<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Formulir extends BaseController
{
    public function __construct()
    {
        $this->suratModel = new SuratModel();
    }
    public function index()
    {
        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir'
        ];

        return view('/admin/dataformulir/index', $data);
    }
    public function skck()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surat = $this->suratModel->getSurat($keyword);
        } else {
            $surat = $this->suratModel->getSurat();
        }

        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir',
            'key'       => $keyword,
            'surat'    => $surat
        ];

        return view('/admin/dataformulir/skck', $data);
    }
    public function suket()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surat = $this->suratModel->getSuket($keyword);
        } else {
            $surat = $this->suratModel->getSuket();
        }

        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir',
            'key'       => $keyword,
            'surat'    => $surat
        ];

        return view('/admin/dataformulir/suket', $data);
    }
}