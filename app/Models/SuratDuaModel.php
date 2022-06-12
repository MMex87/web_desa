<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratDuaModel extends Model
{
    protected $table = 'tbl_surat_kedua';
    protected $primaryKey = 'id_surat';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama', 'jenis_kelamin', 'alamat',
        'umur', 'hari', 'tanggal', 'tempat',
        'nama_surat', 'ibu', 'ayah',
        'penyebab', 'status'
    ];

    public function cariSukem($keyword = false)
    {
        if ($keyword == false) {
            return $this->orderBy('id_surat', 'desc')->where('nama_surat', 'Surat Kematian')->findAll();
        }
        return $this->table('tbl_surat_kedua')->like('nama', $keyword)->orLike('id_surat', $keyword)->where('nama_surat', 'Surat Kematian')->findAll();
    }

    public function cariSukel($keyword = false)
    {
        if ($keyword == false) {
            return $this->orderBy('id_surat', 'desc')->where('nama_surat', 'Surat Kelahiran')->findAll();
        }
        return $this->table('tbl_suratkedua')->like('nama', $keyword)->orLike('id_surat', $keyword)->where('nama_surat', 'Surat Kelahiran')->findAll();
    }

    public function viewSurat($id)
    {
        return $this->where('id_surat', $id)->first();
    }
}