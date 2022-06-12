<?php

namespace App\Controllers;

use App\Models\SuratDuaModel;
use App\Models\SuratModel;
use TCPDF;

class Surat extends BaseController
{
    public function __construct()
    {
        $this->suratModel = new SuratModel();
        $this->suratDuaModel = new SuratDuaModel();
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
            'title' => 'SKCK',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/surat/skck', $data);
    }
    public function suket()
    {
        $data = [
            'navbar' => 'surat',
            'title' => 'Surat Keterangan',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/surat/suket', $data);
    }

    public function sukem()
    {
        $data = [
            'navbar' => 'surat',
            'title' => 'Surat Kematian',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/surat/sukem', $data);
    }
    public function sukel()
    {
        $data = [
            'navbar' => 'surat',
            'title' => 'Surat Kelahiran',
            'validation' => \Config\Services::validation()
        ];
        return view('/user/surat/sukel', $data);
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
        $nama = strtoupper($nama);

        $sukses = $this->suratModel->save([
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

        $db = \Config\Database::connect();
        $id_surat = $db->query('SELECT * FROM tbl_surat')->getLastRow();

        $email_smtp = \Config\Services::email();

        if ($sukses) {
            $user = $db->query('SELECT * FROM users')->getResultArray();
            foreach ($user as $row) {

                $email_smtp->setFrom("kesimantengah123@gmail.com", "Kesimantengah");
                $email_smtp->setTo($row['email']);

                $email_smtp->setSubject("Ada surat SKCK Baru");
                $email_smtp->setMessage("Surat baru dari formulir Surat Keterangan dengan Nomor Permohonan No." . $id_surat . ", silahkan cek web desa kesimantengah dengan click link berikut untuk mengunduh surat tersebut : 
                    http://kesimantengah.my.id/admin");

                $email_smtp->send();
            }
        }



        $data = [
            'navbar'    => 'surat',
            'title'     => 'surat',
            'nama_surat'    => $id_surat->nama_surat,
            'id_surat'  => $id_surat->id_surat
        ];
        return view('/user/surat/confirm', $data);
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

        $nama = strtoupper($nama);

        $sukses = $this->suratModel->save([
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


        $db = \Config\Database::connect();
        $id_surat = $db->query('SELECT * FROM tbl_surat')->getLastRow();

        // email
        $email_smtp = \Config\Services::email();

        if ($sukses) {
            $user = $db->query('SELECT * FROM users')->getResultArray();
            foreach ($user as $row) {

                $email_smtp->setFrom("kesimantengah123@gmail.com", "Kesimantengah");
                $email_smtp->setTo($row['email']);

                $email_smtp->setSubject("Ada Surat Keterangan Baru");
                $email_smtp->setMessage("Surat baru dari formulir Surat Keterangan dengan Nomor Permohonan No." . $id_surat . ", silahkan cek web desa kesimantengah dengan click link berikut untuk mengunduh surat tersebut : 
                    http://kesimantengah.my.id/admin");

                $email_smtp->send();
            }
        }



        $data = [
            'navbar'    => 'surat',
            'title'     => 'surat',
            'nama_surat'    => $id_surat->nama_surat,
            'id_surat'  => $id_surat->id_surat
        ];

        return view('/user/surat/confirm', $data);
    }

    public function savesukem()
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
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'umur' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'hari' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'tempat' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'sebab' => [
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
        $gender = $this->request->getVar('gender');
        $alamat = $this->request->getVar('alamat');
        $umur = $this->request->getVar('umur');
        $hari = $this->request->getVar('hari');
        $tanggal = $this->request->getVar('tanggal');
        $tempat = $this->request->getVar('tempat');
        $sebab = $this->request->getVar('sebab');

        // dd($this->request->getVar());
        $nama = strtoupper($nama);

        $sukses = $this->suratDuaModel->save([
            'nama'      => $nama,
            'nama_surat'        => 'Surat Kematian',
            'jenis_kelamin'     => $gender,
            'alamat'            => $alamat,
            'umur'              => $umur,
            'hari'              => $hari,
            'tanggal'           => $tanggal,
            'penyebab'          => $sebab,
            'tempat'            => $tempat,
            'status'            => '1'
        ]);

        $db = \Config\Database::connect();
        $id_surat = $db->query('SELECT * FROM tbl_surat_kedua')->getLastRow();

        // dd($id_surat);

        $email_smtp = \Config\Services::email();

        if ($sukses) {
            $user = $db->query('SELECT * FROM users')->getResultArray();
            foreach ($user as $row) {

                $email_smtp->setFrom("kesimantengah123@gmail.com", "Kesimantengah");
                $email_smtp->setTo($row['email']);

                $email_smtp->setSubject("Ada Surat Kematian Baru");
                $email_smtp->setMessage("Surat baru dari formulir Surat Kematian , silahkan cek web desa kesimantengah dengan click link berikut untuk melihat surat tersebut : 
                    http://kesimantengah.my.id/admin");

                $email_smtp->send();
            }
        }

        $data = [
            'navbar'        => 'surat',
            'title'         => 'surat',
            'nama_surat'    => $id_surat->nama_surat,
            'id_surat'      => $id_surat->id_surat
        ];
        return view('/user/surat/confirm', $data);
    }

    public function savesukel()
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
            'ibu' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'alpha_space'    => 'Yang kamu masukan bukan huruf Alfabet',
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'ayah' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'alpha_space'    => 'Yang kamu masukan bukan huruf Alfabet',
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'hari' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Kolom harus di isi'
                ]
            ],
            'tempat' => [
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
        $ibu = $this->request->getVar('ibu');
        $ayah = $this->request->getVar('ayah');
        $gender = $this->request->getVar('gender');
        $alamat = $this->request->getVar('alamat');
        $hari = $this->request->getVar('hari');
        $tanggal = $this->request->getVar('tanggal');
        $tempat = $this->request->getVar('tempat');

        // dd($this->request->getVar());
        $nama = strtoupper($nama);
        $ibu = strtoupper($ibu);
        $ayah = strtoupper($ayah);


        $sukses = $this->suratDuaModel->save([
            'nama'              => $nama,
            'nama_surat'        => 'Surat Kelahiran',
            'jenis_kelamin'     => $gender,
            'alamat'            => $alamat,
            'ayah'              => $ayah,
            'ibu'               => $ibu,
            'hari'              => $hari,
            'tanggal'           => $tanggal,
            'tempat'            => $tempat,
            'status'            => '1'
        ]);

        $db = \Config\Database::connect();
        $id_surat = $db->query('SELECT * FROM tbl_surat_kedua')->getLastRow();

        // dd($id_surat);

        $email_smtp = \Config\Services::email();

        if ($sukses) {
            $user = $db->query('SELECT * FROM users')->getResultArray();
            foreach ($user as $row) {

                $email_smtp->setFrom("kesimantengah123@gmail.com", "Kesimantengah");
                $email_smtp->setTo($row['email']);

                $email_smtp->setSubject("Ada Surat Kelahiran Baru");
                $email_smtp->setMessage("Surat baru dari formulir Surat kelahiran , silahkan cek web desa kesimantengah dengan click link berikut untuk melihat surat tersebut : 
                    http://kesimantengah.my.id/admin");

                $email_smtp->send();
            }
        }

        $data = [
            'navbar'        => 'surat',
            'title'         => 'surat',
            'nama_surat'    => $id_surat->nama_surat,
            'id_surat'      => $id_surat->id_surat
        ];
        return view('/user/surat/confirm', $data);
    }

    public function download()
    {
        $id = $this->request->getGet('id_surat');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('KesimanTengah');
        $pdf->setTitle('KesimanTengah');
        $pdf->setSubject('Nomor Pengambilan');
        $pdf->setKeywords('Nomor Pengambilan');

        $pdf->setFont('times', '', 45, '', true);

        $pdf->AddPage('P', 'A4');

        $html = '<!doctype html>
        <html lang="en">
        
        <body>
            
            <h1>Nomer Pengambilan</h1>
            <br>
            <br>
            <span style="font-size: 150px;">' . $id . '</span>

        </body>

        </html>';

        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        $this->response->setContentType('application/pdf');

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('Nomer_Pengambilan_' . $id . '.pdf', 'D');
    }
}