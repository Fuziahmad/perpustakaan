<?php

namespace App\Models;

use CodeIgniter\Model;

class Pinjam_Buku_Model extends Model
{
    protected $table = 'tbl_peminjaman';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'kd_buku', 'pinjam', 'kembali', 'status'];


    public function pinjamBuku($data)
    {

        return $this->save($data);
    }
}
