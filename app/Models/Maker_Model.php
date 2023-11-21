<?php

namespace App\Models;

use CodeIgniter\Model;

class Maker_Model extends Model
{   protected $table = 'tbl_maker';
    protected $primaryKey = 'kd_maker';
    protected $allowedFields = ['nama','alamat','nomor_kontak'];

    public function getMaker($id = false){
        
        $builder = $this->db->table('tbl_maker');
        if($id == false){
            // $query = $builder->get()->getResultArray();
            $query = $builder->get()->getRowArray();
            return $query;
        }else{
            $query = $builder->getWhere(['kd_maker'=>$id]);
            return $query->getRowArray();
        }
    }

    public function setMaker($data){
        $builder = $this->db->table('tbl_maker');
        return $builder->insert($data);
       
    }

    public function updateMaker($id,$data){
        $builder = $this->db->table('tbl_maker')->where('kd_maker',$id);
        return $builder->update($data);
       
    }
    public function deleteMaker($id){
        
        
        return $this->delete($id);
       
    }
}