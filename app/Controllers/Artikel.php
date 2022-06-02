<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();

        $status = $this->request->getVar('arsip');
        $id_artikel = $this->request->getVar('id_artikel');
        $keyword = $this->request->getVar('keyword');
        $publik = $this->request->getGet('pub');
        $draf = $this->request->getGet('draf');
        if ($keyword && $publik) {
            $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE judul_artikel LIKE "%' . $keyword . '%" AND status = 1')->getResultArray();
        } elseif ($keyword && $draf) {
            $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE judul_artikel LIKE "%' . $keyword . '%" AND status = 0')->getResultArray();
        } elseif ($publik) {
            $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE status = 1')->getResultArray();
        } elseif ($draf) {
            $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE status = 0')->getResultArray();
        } elseif ($keyword) {
            $artikel = $db->query('SELECT * FROM `tbl_artikel` WHERE judul_artikel LIKE "%' . $keyword . '%"')->getResultArray();
        } else {
            $artikel = $this->artikelModel->getArtikel();
        }

        if ($status != null) {
            $this->artikelModel->update($id_artikel, ['status' => $status]);
            return redirect()->back();
        }

        $data = [
            'title' => 'Artikel',
            'navbar' => 'artikel',
            'validation' => \Config\Services::validation(),
            'artikel' => $artikel,
            'key' => $keyword,
        ];

        return view('/admin/artikel/index', $data);
    }

    public function save()
    {
        // validasi Inputan
        if (!$this->validate([
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', 'Data Gagal Ditambahkan');
            return redirect()->back()->withInput();
        }

        // get data
        $judul = $this->request->getVar('judul');
        $gambar = $this->request->getFile('gambar');
        $artikel = $this->request->getVar('artikel');



        // validasi gambar kosong
        if ($gambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {

            // generate nama file random
            // ambil nama file
            $namaGambar = $gambar->getRandomName();

            // pindah gambar ke public
            $gambar->move('img/artikel', $namaGambar);
        }

        $this->artikelModel->save([
            'judul_artikel' => $judul,
            'gambar'        => $namaGambar,
            'artikel'       => $artikel,
            'status'        => 1
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function edit()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', 'Data Gagal Diubah');
            return redirect()->back()->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        $id = $this->request->getVar('id_artikel');

        // Mencari artikel berdasarkan id
        $artikel = $this->artikelModel->find($id);

        // cek gambar
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file random
            // ambil nama file
            $namaGambar = $fileGambar->getRandomName();

            // pindah gambar ke public
            $fileGambar->move('img/artikel', $namaGambar);

            if ($artikel['gambar'] != 'default.png') {
                // hapus gambar
                unlink('img/artikel/' . $artikel['gambar']);
            }
        }
        $judul = $this->request->getVar('judul');
        $artikelText = $this->request->getVar('artikel');
        $this->artikelModel->save([
            'id_artikel' => $id,
            'judul_artikel' => $judul,
            'gambar' => $namaGambar,
            'artikel' => $artikelText
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id)
    {
        $artikel = $this->artikelModel->find($id);

        // cek jika gambar default.png

        if ($artikel['gambar'] != 'default.png') {
            // hapus gambar
            unlink('img/artikel/' . $artikel['gambar']);
        }

        $this->artikelModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus');
        return redirect()->back();
    }
}