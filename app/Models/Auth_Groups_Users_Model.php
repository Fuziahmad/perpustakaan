<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_Groups_Users_Model extends Model
{
    protected $table = 'auth_groups_users';
    protected $primaryKey = 'group_id';

    public function deleteGroupUsers($userId)
    {
        
        return $this->where('user_id', $userId)->delete();
    }
    
}
