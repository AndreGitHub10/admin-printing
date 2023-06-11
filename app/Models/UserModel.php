<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id_user', 'name', 'password', 'level', 'created_at'];

    public function getUsers()
    {
        return $this->findAll();
    }
}
