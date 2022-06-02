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

    public function cariArtikel($keyword)
    {

        // $builder = $this->like('judul_artikel', $keyword);
        // return $builder;

        return $this->table('tbl_artikel')->like('judul_artikel', $keyword)->orLike('artikel', $keyword);
    }
}