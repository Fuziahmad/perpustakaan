<?php

namespace App\Models;

use CodeIgniter\Model;

class Peminjaman_Buku_Model extends Model
{
    protected $table = 'tbl_peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['status'];

    public function getPeminjaman($id = false)
    {

        if ($id == false) {

            return $this->select('users.username, users.nama, users.alamat, tbl_peminjaman.id_user')
                ->join('users', 'users.id = tbl_peminjaman.id_user')
                ->findAll();
        } else {
            return $this->select('users.username, users.nama, users.alamat, tbl_buku.judul_buku, tbl_buku.pengarang, tbl_peminjaman.id, tbl_peminjaman.pinjam, tbl_peminjaman.kembali, tbl_peminjaman.status')
                ->join('users', 'users.id = tbl_peminjaman.id_user')
                ->join('tbl_buku', 'tbl_buku.kd_buku = tbl_peminjaman.kd_buku')
                ->where('tbl_peminjaman.id_user', $id)
                ->findAll();
        }
    }



    public function JumlahPeminjaman()
    {
        $query = $this->where('id_user', user()->id)
                      ->where('status', 'Di Pinjam')
                      ->countAllResults();
        return $query;
    }
    

    public function kembali($id, $data)
    {
        $builder = $this->db->table('tbl_peminjaman')->where('id', $id);
        return $builder->update($data);
    }
}
