<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Surat extends BaseController
{
    public function __construct()
    {
        $this->suratModel = new SuratModel();
    }
    public function index()
    {
        $data = [
            'navbar' => 'surat',
            'title' => 'surat'
        ];
        return view('/user/surat/index', $data);
    }

    public function skck()
    {
        $data = [
            'navbar' => 'surat',
            'title' => 'surat',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/surat/skck', $data);
    }
    public function suket()
    {
        $data = [
            'navbar' => 'surat',
            'title' => 'surat',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/surat/suket', $data);
    }

    public function saveskck()
    {
        // validation inputan
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'alpha_space'    => 'Yang kamu masukan bukan huruf Alfabet',
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'tempat' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'nik' => [
                'rules' => 'required|max_length[16]|min_length[16]|numeric',
                'errors' => [
                    'required'      => 'Kolom harus di isi',
                    'max_length'    => 'Panjang isi Harus 16 digit',
                    'min_length'    => 'Panjang isi Harus 16 digit',
                    'numeric'       => 'Harus Berisi Angka',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        // ambil data
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $lahir = $this->request->getVar('lahir');
        $nik = $this->request->getVar('nik');
        $gender = $this->request->getVar('gender');
        $work = $this->request->getVar('work');
        $kawin = $this->request->getVar('kawin');
        $agama = $this->request->getVar('agama');
        $alamat = $this->request->getVar('alamat');

        // dd($this->request->getVar());

        $this->suratModel->save([
            'nama_lengkap'      => $nama,
            'nama_surat'        => 'Surat Keterangan Catatan Kepolisian',
            'nik'               => $nik,
            'jenis_kelamin'     => $gender,
            'tempat'            => $tempat,
            'tanggal_lahir'     => $lahir,
            'pekerjaan'         => $work,
            'status_perkawinan' => $kawin,
            'alamat'            => $alamat,
            'agama'             => $agama,
            'status'            => '1'
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->back();
    }

    public function savesuket()
    {
        // validation inputan
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'alpha_space'    => 'Yang kamu masukan bukan huruf Alfabet',
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'tempat' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'nik' => [
                'rules' => 'required|max_length[16]|min_length[16]|numeric',
                'errors' => [
                    'required'      => 'Kolom harus di isi',
                    'max_length'    => 'Panjang isi Harus 16 digit',
                    'min_length'    => 'Panjang isi Harus 16 digit',
                    'numeric'       => 'Harus Berisi Angka',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'maksud' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        // ambil data
        $nama = $this->request->getVar('nama');
        $tempat = $this->request->getVar('tempat');
        $lahir = $this->request->getVar('lahir');
        $nik = $this->request->getVar('nik');
        $gender = $this->request->getVar('gender');
        $work = $this->request->getVar('work');
        $kawin = $this->request->getVar('kawin');
        $agama = $this->request->getVar('agama');
        $alamat = $this->request->getVar('alamat');
        $maksud = $this->request->getVar('tujuan');
        $tujuan = $this->request->getVar('maksud');

        // dd($this->request->getVar());

        $this->suratModel->save([
            'nama_lengkap'      => $nama,
            'nama_surat'        => 'Surat Keterangan',
            'nik'               => $nik,
            'jenis_kelamin'     => $gender,
            'tempat'            => $tempat,
            'tanggal_lahir'     => $lahir,
            'pekerjaan'         => $work,
            'status_perkawinan' => $kawin,
            'alamat'            => $alamat,
            'agama'             => $agama,
            'maksud'            => $maksud,
            'tujuan'            => $tujuan,
            'status'            => '1'
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->back();
    }
}