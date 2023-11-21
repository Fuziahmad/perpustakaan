<?php

namespace App\Models;

use CodeIgniter\Model;

class Anggota_Model extends Model
{
    protected $table = 'tbl_anggota';
    protected $primaryKey = 'kd_anggota';
    protected $allowedFields = ['nama','jk','alamat','status'];

    public function getAnggota($id = false){
        $builder = $this->db->table('tbl_anggota');
        if($id == false){
            $query = $builder->get()->getResultArray();
            return $query;
        }else{
            $query = $builder->getWhere(['kd_anggota'=>$id]);
            return $query->getRowArray();
        }
    }

    public function setAnggota($data){
        $builder = $this->db->table('tbl_anggota');

        return $builder->insert($data);
    }

    public function updateAnggota($id,$data){
        $builder = $this->db->table('tbl_anggota')->where('kd_anggota',$id);

        return $builder->update($data);
    }

    public function deleteAnggota($id){
      

        return $this->delete($id);
    }

}