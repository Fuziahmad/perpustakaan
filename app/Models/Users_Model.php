<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_Model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'email', 'username', 'nama', 'jk', 'alamat', 'status'];

    public function getUsers($id = false)
    {
        $builder = $this->db->table('users');
        if ($id == false) {
            $query = $builder->get()->getResultArray();
            return $query;
        } else {
            $query = $builder->getWhere(['id' => $id]);
            return $query->getRowArray();
        }
    }

    public function setUsers($data)
    {


        return $this->save($data);
    }

    public function deleteUser($id)
    {

        return $this->delete($id);
    }
}
