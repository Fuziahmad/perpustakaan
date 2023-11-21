<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku_Model extends Model
{
    protected $table = 'tbl_buku';
    protected $primaryKey = 'kd_buku';
    protected $allowedFields = ['judul_buku', 'pengarang', 'penerbit'];
    protected $useTimestamps = true;
    public function getBuku($id = false)
    {

        $builder = $this->db->table('tbl_buku');
        if ($id == false) {
            $query = $builder->get()->getResultArray();
            return $query;
        } else {
            $query = $builder->getWhere(['kd_buku' => $id]);
            return $query->getRowArray();
        }
    }

    public function setBuku($data)
    {
        $builder = $this->db->table('tbl_buku');
        return $builder->insert($data);
    }

    public function updateBuku($id, $data)
    {
        $builder = $this->db->table('tbl_buku')->where('kd_buku', $id);
        return $builder->update($data);
    }
    public function deleteBuku($id)
    {

        return $this->delete($id);
    }

    public function bukuSaya()
    {
        $builder = $this->db->table('tbl_buku');
        $builder->select('tbl_buku.judul_buku, tbl_buku.pengarang, tbl_buku.penerbit, tbl_peminjaman.pinjam');
        $builder->join('tbl_peminjaman', 'tbl_peminjaman.kd_buku = tbl_buku.kd_buku');
        $builder->where('tbl_peminjaman.id_user', user()->id);
        $builder->where('tbl_peminjaman.status', 'Di Pinjam');
        return $builder->get()->getResultArray();
    }
}
