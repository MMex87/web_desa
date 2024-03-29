<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class Agenda extends BaseController
{
    public function __construct()
    {
        $this->agendaModel = new AgendaModel();
    }
    public function index()
    {
        $db = \Config\Database::connect();

        $keyword = $this->request->getVar('keyword');
        $desc = $this->request->getGet('des');
        // $draf = $this->request->getGet('draf');
        if ($keyword && $desc) {
            $agenda = $db->query('SELECT * FROM `tbl_agenda` WHERE nama_agenda LIKE "%' . $keyword . '%" ORDER BY nama_agenda DESC')->getResultArray();
        } elseif ($desc) {
            $agenda = $db->query('SELECT * FROM `tbl_agenda` ORDER BY nama_agenda DESC')->getResultArray();
        } elseif ($keyword) {
            $agenda = $db->query('SELECT * FROM `tbl_agenda` WHERE nama_agenda LIKE "%' . $keyword . '%"')->getResultArray();
        } else {
            $agenda = $this->agendaModel->getAgenda();
        }

        $data = [
            'title' => 'Agenda',
            'navbar' => 'agenda',
            'validation' => \Config\Services::validation(),
            'agenda' => $agenda,
            'key' => $keyword
        ];

        return view('/admin/agenda/index', $data);
    }

    public function save()
    {

        // get data
        $nama = $this->request->getVar('namaAg');
        $tglM = $this->request->getVar('tglM');
        $tglS = $this->request->getVar('tglS');
        $desc = $this->request->getVar('desc');


        $sukses = $this->agendaModel->save([
            'nama_agenda' => $nama,
            'tanggal_mulai' => $tglM,
            'tanggal_selesai' => $tglS,
            'deskripsi_agenda' => $desc,
            'status' => 1
        ]);

        $db = \Config\Database::connect();
        $email_smtp = \Config\Services::email();

        if ($sukses) {
            $user = $db->query('SELECT * FROM user_informasi')->getResultArray();
            foreach ($user as $row) {

                $email_smtp->setFrom("kesimantengah123@gmail.com", "Kesimantengah");
                $email_smtp->setTo($row['email']);

                $email_smtp->setSubject("Agenda baru sudah hadir");
                $email_smtp->setMessage("Agenda baru telah hadir di Web Desa Kesimantengah, silahkan kunjungi link berikut untuk mengetahui lebih lanjut : 
                    http://kesimantengah.my.id/informasi");

                $email_smtp->send();
            }
        }

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function edit()
    {
        // get data
        $nama = $this->request->getVar('namaAg');
        $tglM = $this->request->getVar('tglM');
        $tglS = $this->request->getVar('tglS');
        $desc = $this->request->getVar('desc');
        $id = $this->request->getVar('id_agenda');

        $this->agendaModel->save([
            'id_agenda' => $id,
            'nama_agenda' => $nama,
            'tanggal_mulai' => $tglM,
            'tanggal_selesai' => $tglS,
            'deskripsi_agenda' => $desc,
            'status' => 1
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->agendaModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus');
        return redirect()->back();
    }
}