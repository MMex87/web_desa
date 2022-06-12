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
        $builderArtikel = $db->table('tbl_artikel');

        $keyArtikel = $this->request->getVar('cariArtikel');
        $keyAgenda = $this->request->getVar('cari_agenda');

        if ($keyArtikel) {
            $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE judul_artikel LIKE "%' . $keyArtikel . '%"AND status = 1')->getResultArray();
            $builderArtikel->like($keyArtikel);
            $builderArtikel->from('judul_artikel');
            $builderArtikel->where('status', 1);
            $artikelWaktu = $db->query('SELECT crated_at FROM `tbl_artikel` WHERE judul_artikel LIKE "%' . $keyArtikel . '%"AND status = 1')->getResultArray();
        } else {
            $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE status = 1')->getResultArray();
            $builderArtikel->where('status', 1);
            $artikelWaktu = $db->query('SELECT created_at FROM `tbl_artikel` WHERE status = 1')->getResultArray();
        }

        if ($keyAgenda) {
            $agenda = $db->query(('SELECT * FROM tbl_agenda WHERE nama_agenda LIKE "%' . $keyAgenda . '%" AND statyus = 1'))->getResultArray();
        } else {
            $agenda = $this->agendaModel->getTerdekat();
        }


        // d($artikelWaktu);
        // dd($isiArtikel);

        // $update = Time::parse('March 9, 2016 12:00:00', 'Asia/Jakarta');
        // $update->humanize();

        $isiArtikel = $builderArtikel->countAllResults();
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
            'waktu'         => $waktu
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
}