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
            $surat = $this->suratModel->cariSurat($keyword);
        } else {
            $surat = $this->suratModel->cariSurat();
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
            $surat = $this->suratModel->cariSuket($keyword);
        } else {
            $surat = $this->suratModel->cariSuket();
        }
        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir',
            'key'       => $keyword,
            'surat'    => $surat
        ];

        return view('/admin/dataformulir/suket', $data);
    }

    public function viewsk($id)
    {
        $surat = $this->suratModel->viewSurat($id);

        $this->suratModel->where('id_surat', $id)->set(['status' => '0'])->update();

        $data = [
            'navbar'        => 'surat',
            'title'         => 'view',
            'keterangan'    => 'suket',
            'surat'         => $surat
        ];
        return view('/admin/dataformulir/view', $data);
    }

    public function viewskck($id)
    {
        $surat = $this->suratModel->viewSurat($id);
        $this->suratModel->where('id_surat', $id)->set(['status' => '0'])->update();
        $data = [
            'navbar'        => 'surat',
            'title'         => 'view',
            'keterangan'    => 'skck',
            'surat'         => $surat
        ];
        return view('/admin/dataformulir/view', $data);
    }
}