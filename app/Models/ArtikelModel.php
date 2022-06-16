<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'tbl_artikel';
    protected $primaryKey = 'id_artikel';
    protected $useTimestamps = true;

    protected $allowedFields = ['judul_artikel', 'gambar', 'artikel', 'status'];

    public function getArtikel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_artikel' => $id])->first();
    }

    public function cariArtikel($keyword = false)
    {

        if ($keyword == false) {
            return $this->where(['status' => '1'])->findAll();
        }

        return $this->table('tbl_artikel')->like('judul_artikel', $keyword)->where(['status' => '1'])->findAll();
    }
}