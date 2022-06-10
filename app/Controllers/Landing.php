<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use CodeIgniter\I18n\Time;

class Landing extends BaseController
{
    public function __construct()
    {
        $this->agendaModel = new AgendaModel();
    }
    public function index()
    {
        $tanggal = Time::now();

        $agenda = $this->agendaModel->getTanggal();
        foreach ($agenda as $row) {
            if ($tanggal > $row['tanggal_selesai']) {
                $this->agendaModel->where('id_agenda', $row['id_agenda'])->set(['status' => 0])->update();
            }
        }

        return view('/user/landing/index');
    }
}