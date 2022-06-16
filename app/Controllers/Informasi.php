<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use App\Models\ArtikelModel;
use CodeIgniter\I18n\Time;

class Informasi extends BaseController
{
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->agendaModel = new AgendaModel();
        $this->waktu = Time::now('Asia/Jakarta');
    }
    public function index()
    {
        $db = \Config\Database::connect();
        $builderArtikel = $this->artikelModel->builder();

        $keyArtikel = $this->request->getVar('cariArtikel');
        $keyAgenda = $this->request->getVar('cari_agenda');

        if ($keyArtikel) {
            $artikel = $this->artikelModel->cariArtikel($keyArtikel);
            $builderArtikel->like('judul_artikel', $keyArtikel);
            $builderArtikel->where('status', 1);
            $isiArtikel = $builderArtikel->countAllResults();
            $artikelWaktu = $this->artikelModel->cariArtikel($keyArtikel);
        } else {
            $artikel = $this->artikelModel->cariArtikel();
            $builderArtikel->where('status', '1');
            $isiArtikel = $builderArtikel->countAllResults();
            $artikelWaktu = $this->artikelModel->cariArtikel();
        }

        if ($keyAgenda) {
            $agenda = $db->query('SELECT * FROM tbl_agenda WHERE nama_agenda LIKE "%' . $keyAgenda . '%" AND status = 1')->getResultArray();
        } else {
            $agenda = $this->agendaModel->getTerdekat();
        }

        $currentPage = $this->request->getVar('page_artikel') ? $this->request->getVar('page_artikel') : 1;


        // d($artikelWaktu);
        // d($isiArtikel);
        // dd($artikel);

        // $update = Time::parse('March 9, 2016 12:00:00', 'Asia/Jakarta');
        // $update->humanize();


        $i = 0;
        if ($isiArtikel) {
            while ($i < $isiArtikel) {
                $waktu[$i] = Time::parse($artikelWaktu[$i]['created_at']);
                // d($waktu);
                $i++;
            }
        } else {
            $waktu[] = null;
        }
        // dd($update);

        $data = [
            'navbar'        => 'informasi',
            'title'         => 'informasi',
            'artikel'       => $artikel,
            'keyArtikel'    => $keyArtikel,
            'agenda'        => $agenda,
            'cariAgenda'    => $keyAgenda,
            'waktu'         => $waktu,
            'validation'    => \Config\Services::validation()
        ];
        return view('/user/informasi/index', $data);
    }

    public function viewArtikel($id_artikel)
    {
        $judul = $this->artikelModel->getArtikel($id_artikel)['judul_artikel'];
        $gambar = $this->artikelModel->getArtikel($id_artikel)['gambar'];
        $artikel = $this->artikelModel->getArtikel($id_artikel)['artikel'];

        $data = [
            'navbar' => 'informasi',
            'title' => 'Artikel',
            'judul' => $judul,
            'gambar' => $gambar,
            'artikel' => $artikel
        ];
        return view('/user/artikel/index', $data);
    }

    public function saveEmail()
    {
        if (!$this->validate([
            "email" => [
                'rules' => 'valid_email|is_unique[user_informasi.email]',
                'errors' => [
                    'valid_email' => 'email yang anda masukan tidak valid',
                    'is_unique' => 'email yang anda masukan sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }


        $db = \Config\Database::connect();
        $email = $this->request->getVar('email');
        $data = [
            'email' => $email
        ];


        $save = $db->table('user_informasi');
        $confirm = $save->insert($data);
        if ($confirm)
            return redirect()->back()->with('berhasil', 'Terimakasih Data berhasil di inputkan, tunggu updatean terbaru dari web kami');
        else
            return redirect()->back()->with('gagal', 'Data Gagal Di tambahkan');
    }
}