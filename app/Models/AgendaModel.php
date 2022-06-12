<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'tbl_agenda';
    protected $primaryKey = 'id_agenda';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_agenda', 'tanggal_selesai', 'deskripsi_agenda', 'status'];

    public function getAgenda($id = false)
    {
        if ($id == false) {
            return $this->orderBy('nama_agenda', 'asc')->where('status', 1)->findAll();
        }
        return $this->where(['id_agenda' => $id])->first();
    }
    public function getTerdekat()
    {
        return $this->orderBy('tanggal_selesai', 'asc')->where('status', 1)->findAll();
    }

    public function getTanggal()
    {
        return $this->findAll();
    }
}