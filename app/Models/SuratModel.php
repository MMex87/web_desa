<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table = 'tbl_surat';
    protected $primaryKey = 'id_surat';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama_lengkap', 'nama_surat', 'nik',
        'jenis_kelamain', 'tempat', 'tanggal_lahir', 'pekerjaan',
        'status_perkawinan', 'alamat', 'agama', 'maksud', 'tujuan'
    ];

    public function getSurat($keyword = false)
    {
        if ($keyword == false) {
            return $this->orderBy('id_surat', 'desc')->where('nama_surat', 'Surat Keterangan Catatan Kepolisian')->findAll();
        }
        return $this->table('tbl_surat')->like('nama_lengkap', $keyword)->orLike('id_surat', $keyword)->where('nama_surat', 'Surat Keterangan Catatan Kepolisian')->findAll();
    }

    public function getSuket($keyword = false)
    {
        if ($keyword == false) {
            return $this->orderBy('id_surat', 'desc')->where('nama_surat', 'Surat Keterangan')->findAll();
        }
        return $this->table('tbl_surat')->like('nama_lengkap', $keyword)->orLike('id_surat', $keyword)->where('nama_surat', 'Surat Keterangan')->findAll();
    }
}